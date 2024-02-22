<template>
    <div class="container">
      <div class="row">
          <div class="col-lg-12 mb-4">
              <router-link :to="{name:'CreateClients'}" class="btn btn-success">Add</router-Link>
          </div>
    </div>
    <div class="col-12">
      <div class="table-responsive">
          <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>vehicle's Id</th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="(client, index) in clients" :key="index">
          <td>{{ client.id }}</td>
          <td>{{ client.name }}</td>
          <td>{{ client.vehicle.brand}}</td>
          <td>
              <a type="button" @click="deleteClient(client.id)" class="btn btn-danger">delete</a>
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
        clients: []
      }
    },
    created(){
      this.fetchDataFromDatabase()
    },
    methods: {
      async fetchDataFromDatabase() {
        await axios.get('clients')
          .then(response => {
            this.clients=response.data
            // console.log(response.data);
          })    
          .catch(error => {
            console.error('Error al obtener datos:', error);
          })
        },  
//         async deleteVehicle(id) {
//     if (confirm("¿Desea eliminar el registro?")){
//       try {
//         await axios.delete(`clients/${id}`);
//         // Remover el vehículo de la lista en el frontend
//         this.vehicles = this.clients.filter(client => client.id !== id);
//         console.log('Cliente eliminado exitosamente');
//       } catch (error) {
//         console.error('Error al eliminar el vehículo:', error);
//       }
//     }
//   }
    }
    
  }
  </script>