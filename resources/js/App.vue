<template>
  <main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary hide">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Dealer</a>
        <button class="navbar-toggler" type="button" @click="toggleMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div :class="['collapse', 'navbar-collapse', { 'show': isMenuOpen }]" id="navbarSupportedContent">
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
export default {
  data() {
    return {
      isMenuOpen: false
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    }
  }
};
</script>

<!-- <style scoped>
@media (max-width: 792px) {
  .navbar {
    width: auto;
    height: 100vh;
    align-items: flex-start;
    position: fixed;
    top: 0;
    left: -100%; /* Initially hidden */
    z-index: 1000;
    background-color: #007bff;
    padding: 15px;
    transition: left 0.5s ease; /* Smooth transition for appearing */
  }
  .navbar.show {
    left: 0; /* Show navbar when the 'show' class is added */
  }
  .navbar-toggler {
    display: block; /* Ensure the toggle button is visible */
  }
  .navbar-brand {
    margin-left: 0.5em;
    padding-bottom: 0;
    border-bottom: 4px solid #fff;
    color: #fff;
    font-weight: bold;
  }
  .navbar-toggler-icon {
    color: #fff;
    font-size: 1.5em;
  }
  .navbar-collapse {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease-out; /* Smooth transition for expanding */
  }
  .navbar-collapse.show {
    max-height: 500px; /* Adjust as needed */
    overflow: auto;
  }
  .nav-link {
    color: #fff;
  }
}
</style> -->





