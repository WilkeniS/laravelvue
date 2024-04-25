<template>
  <div class="container mt-4">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
        <router-link :to="{ name: 'CreateVehicle' }" class="btn btn-success hide ms-2"><ion-icon name="add-circle" size="small"></ion-icon></router-link>
        <button @click="printTable" class="btn btn-dark hide ms-2"><ion-icon name="print" size="small"></ion-icon></button>
        <button @click="fetchDataFromDatabase" class="btn btn-primary ms-2 hide"><ion-icon name="refresh-circle" size="small"></ion-icon></button>
      </div>
    </div>
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Brand</th>
              <th>Year</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(vehicle, index) in vehicles" :key="index">
              <td>{{ vehicle.id }}</td>
              <td>{{ vehicle.brand }}</td>
              <td>{{ vehicle.year }}</td>
              <td>{{ vehicle.status }}</td>
              <td class="align-middle button-cell">
                  <div class="button-container">
                      <router-link :to="{ name: 'EditVehicle', params: { id: vehicle.id } }" class="btn btn-primary hide mr-2"><ion-icon name="create" size="small"></ion-icon></router-link>
                      <button type="button" @click="deleteVehicle(vehicle.id)" class="btn btn-danger hide"><ion-icon name="trash" size="small"></ion-icon></button>
                  </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>  
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      vehicles: []
    }
  },
  created() {
    this.fetchDataFromDatabase();
  },
  methods: {
    printTable() {
      window.print();
    },
    async fetchDataFromDatabase() {
      try {
        const response = await axios.get('vehicles');
        this.vehicles = response.data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    },  
    async deleteVehicle(id) {
      try {
        const result = await Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        });
        
        if (result.isConfirmed) {
          await axios.delete(`vehicles/${id}`);
          this.vehicles = this.vehicles.filter(vehicle => vehicle.id !== id);
          await Swal.fire(
            'Deleted!',
            'Your vehicle has been deleted.',
            'success'
          );
        }
      } catch (error) {
        console.error('Error deleting vehicle:', error);
        await Swal.fire(
          'Error!',
          'An error occurred while deleting the vehicle.',
          'error'
        );
      }
    }
  }
}
</script>

<style>
.button-container .btn {
  margin-right: 5px; /* Cambia este valor según tu preferencia */
}
</style>
