<template>
  <div class="container mt-4">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
        <router-link :to="{ name: 'CreateClients' }" class="btn btn-success hide ms-2"><ion-icon name="add-circle" size="small"></ion-icon></router-Link>
        <button @click="printTable" class="btn btn-dark hide ms-2"><ion-icon name="print" size="small"></ion-icon></button>
        <button @click="refreshPage" class="btn btn-primary ms-2"><ion-icon name="refresh-circle" size="small"></ion-icon></button>
      </div>
    </div>
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Vehicle's Id</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(client, index) in clients" :key="index">
              <td>{{ client.id }}</td>
              <td>{{ client.name }}</td>
              <td>{{ client.vehicle.brand }}</td>
              <td class="align-middle button-cell">
                <router-link :to="{ name: 'editClient', params: { id: client.id } }" class="btn btn-primary hide"><ion-icon name="create"></ion-icon></router-link>
                <button @click="confirmDelete(client.id)" class="btn btn-danger hide"><ion-icon name="trash"></ion-icon></button>
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
      clients: []
    };
  },
  created() {
    this.fetchDataFromDatabase();
  },
  methods: {
    refreshPage(){
      window.location.reload()
    },
    printTable() {
      window.print();
    },
    async fetchDataFromDatabase() {
      try {
        const response = await axios.get('clients-list');
        this.clients = response.data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    },
    async deleteClient(id) {
      try {
        await axios.delete(`clients/${id}`);
        // Remove the client from the frontend list
        this.clients = this.clients.filter(client => client.id !== id);
        console.log('Client successfully deleted');
      } catch (error) {
        console.error('Error deleting client:', error);
      }
    },
    async confirmDelete(id) {
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
          await this.deleteClient(id);
          Swal.fire('Deleted!', 'The client has been deleted.', 'success');
        }
      } catch (error) {
        console.error('Error deleting client:', error);
      }
    }
  }
};
</script>

<style scoped>
@media print {
  .hide {
    display: none;
  }
}
</style>
