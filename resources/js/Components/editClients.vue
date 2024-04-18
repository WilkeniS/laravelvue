<template>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="card" style="width: 50%;">
                    <div class="card-body">
                        <h5 class="card-title">Edit Client</h5>
                        <form @submit.prevent="edit">
                            <div class="row">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" class="form-control" v-model="client.name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" v-model="client.vehicle_id"></textarea>
                                    <label for="year">Vehicle Id</label>
                                </div>
                                <div class="error-message" v-if="invalidYear">Invalid year. Please enter a valid year.</div>
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
    name: "editClient",
    data() {
        return {
            client:{
                name: "",
                vehicle_id: "",
            },
            invalidYear: false
        };
    },
    mounted() {
        this.showClient();
    },
    methods: {
        async showClient() {
            try {
                const response = await axios.get(`clients/${this.$route.params.id}`)
                console.log(response)
                const { name, vehicle_id } = response.data;
                this.client.name = name;
                this.client.vehicle_id = vehicle_id;
            } catch (error) {
                console.error("Error fetching client data:", error);
            }
            console.log(JSON.stringify(this.$route.params.client))
        },
        async edit() {
            // Validación del año
            const year = parseInt(this.client.vehicle_id);
            if (isNaN(year) || year < 1900 || year > new Date().getFullYear()) {
                this.invalidYear = true;
                return;
            } else {
                this.invalidYear = false;
            }

            try {
                await axios.put(`clients/${this.$route.params.id}`, {
                    name: this.client.name,
                    vehicle_id: this.client.vehicle_id
                });
                this.$router.push({ name: "showClients" });
            } catch (error) {
                console.error("Error updating showClient:", error);
            }
        }
    }
};
</script>

<style scoped>
.error-message {
    color: red;
    margin-top: 5px;
}
</style>
