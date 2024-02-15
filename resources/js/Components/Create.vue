<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 18rem;">
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
            // Verificar si la solicitud POST fue exitosa (código de estado HTTP 2xx)
            if (response.status >= 200 && response.status < 300) {
                // Redirigir a la página "showVehicle" después de que se haya creado el vehículo
                this.$router.push({ name: "showVehicle" });
            } else {
                // Manejar cualquier otro código de estado HTTP aquí
                console.error('Error en la solicitud POST:', response.statusText);
            }
        } catch (error) {
            // Manejar errores de red u otros errores aquí
            console.error('Error en la solicitud POST:', error);
        }
    }
}

};
</script>
