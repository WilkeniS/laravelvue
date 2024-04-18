<template>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="card" style="width: 50%;">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Clientes</h5>
                        <form @submit.prevent="create">

                            <div class="row">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="client.name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" v-model="client.vehicle_id"></textarea>
                                    <label for="floatingTextarea">ID de su vehiculo</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    name: "CreateClients",
    data() {
        return {
            client: {
                name: "",
                vehicle_id: ""
            }
        };
    },
    methods: {
        async create() {
            try {
                const response = await axios.post('/clients', this.client);
                if (response.status >= 200 && response.status < 300) {
                    // Redirige a la página "showClients" si la solicitud es exitosa
                    this.$router.push({ name: "showClients" });
                } else {
                    throw new Error('Error in POST request');
                }
            } catch (error) {
                console.error('Error:', error);
                // Muestra una alerta de error si ocurre algún error en la solicitud
                await Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        }
    }
};
</script>
