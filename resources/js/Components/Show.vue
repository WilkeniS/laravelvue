<template>
  <div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to="{name:'CreateVehicle'}" class="btn btn-success">Add</router-Link>
        </div>
  </div>
  <div class="col-12">
    <div class="table-responsive">
        <table class="table table-hover">
    <thead>
      <tr>
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
        <td>
          <router-link :to='{name:"EditVehicle", params:{id:vehicle.id}}' class="btn btn-info">Edit</router-Link>
            <a type="button" @click="deleteVehicle(vehicle.id)" class="btn btn-danger">delete</a>
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

export default {
  data() {
    return {
      vehicles: []
    }
  },
  created(){
    this.fetchDataFromDatabase()
  },
  methods: {
    async fetchDataFromDatabase() {
      await axios.get('vehicles')
        .then(response => {
          this.vehicles=response.data
          console.log(response.data);
        })    
        .catch(error => {
          console.error('Error al obtener datos:', error);
        })
      },  
      async deleteVehicle(id) {
  if (confirm("¿Desea eliminar el registro?")){
    try {
      await axios.delete(`vehicles/${id}`);
      // Remover el vehículo de la lista en el frontend
      this.vehicles = this.vehicles.filter(vehicle => vehicle.id !== id);
      console.log('Vehículo eliminado exitosamente');
    } catch (error) {
      console.error('Error al eliminar el vehículo:', error);
    }
  }
}
  }
  
}
</script>