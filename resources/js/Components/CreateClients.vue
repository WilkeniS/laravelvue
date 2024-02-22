<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 18rem;">
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
        const response = await axios.post('clients', this.client);
        // Verificar si la solicitud POST fue exitosa (código de estado HTTP 2xx)
        if (response.status >= 200 && response.status < 300) {
            // Redirigir a la página "clients" después de que se haya creado el vehículo
            this.$router.push({ name: "showClients" });
        } else {
            // Manejar cualquier otro código de estado HTTP aquí
            console.error('Error en la solicitud POST:', response.statusText);
        }
    }

}

};
</script>
