<template>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="card" style="width: 50%;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <form @submit.prevent="create">

                            <div class="row">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input type="text" class="form-control" v-model="vehicle.brand">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" v-model="vehicle.year"></textarea>
                                    <label for="floatingTextarea">Year</label>
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
    name: "CreateVehicle",
    data() {
        return {
            vehicle: {
                year: "",
                brand: ""
            }
        };
    },
    methods: {
        async create() {
            try {
                const response = await axios.post('vehicles', this.vehicle);
                if (response.status >= 200 && response.status < 300) {
                    // Muestra una alerta de éxito
                    this.$router.push({ name: "showVehicle" });
                } else {
                    throw new Error('Error in POST request');
                }
            } catch (error) {
                console.error('Error:', error);
                // Muestra una alerta de error
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
