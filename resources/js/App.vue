<template>
<main>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary hide">
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
          <router-link exact-active-class="active" to="/clients" class="nav-link active" aria-current="page">Clients</router-link>
        </li>
      </ul>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
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
    export default {}
</script>
<style scoped>
@media (max-width: 792px) {
  .navbar,
  .navbar-collapse {
    flex-direction: column;
  }
  .navbar-expand-lg .navbar-nav {
    flex-direction: column;
  }
  .navbar {
    width: auto; /* Cambiado a auto para que ocupe el ancho necesario */
    height: 100vh;
    align-items: flex-start;
    position: fixed; /* Añadido para mantener el navbar fijo */
    top: 0; /* Añadido para asegurar que el navbar se mantenga en la parte superior */
    left: 0; /* Añadido para que el navbar esté en el lado izquierdo */
    z-index: 1000; /* Añadido para asegurar que esté por encima del contenido */
    background-color: #333; /* Cambiado el color de fondo para mayor contraste */
    padding: 15px; /* Añadido para dar espacio al contenido dentro del navbar */
  }
  .navbar-brand {
    margin-left: 0.5em;
    padding-bottom: 0;
    border-bottom: 4px solid #464646;
  }
  form input {
    margin-bottom: 0.7em;
  }
}
</style>
