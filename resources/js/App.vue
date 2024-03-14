<template>
<main>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dealer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link exact-active-class="active" to="/" class="nav-link active" aria-current="page">Inicio</router-link>
        </li>
        <li class="nav-item">
          <router-link exact-active-class="active" to="/create" class="nav-link active" aria-current="page">Create</router-link>
        </li>
        <li class="nav-item">
          <router-link exact-active-class="active" to="/edit/id" class="nav-link active" aria-current="page">Edit</router-link>
        </li>
        <li class="nav-item">
          <router-link exact-active-class="active" to="/clients" class="nav-link active" aria-current="page">Clients</router-link>
        </li>
      </ul>
      <form class="d-flex" role="search" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit" >Search</button>
      </form>
    </div>
  </div>
</nav>
<div>
  <router-view></router-view>
</div>
</main>
</template>
<script>

import axios from 'axios';

export default {
  data() {
    return{
    search:''
    }
  },
  methods: {
    findVehicle(){
      this.$inertia.get('/vehicles?search=', this.search)
        .then(response => {
          this.vehicles = response.data;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  }
};
</script>
<style>
</style>