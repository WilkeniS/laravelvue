<template>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="card" style="width: 50%;">
                    <div class="card-body">
                        <h5 class="card-title">Edit Vehicle</h5>
                        <form @submit.prevent="edit">
                            <div class="row">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" class="form-control" v-model="vehicle.brand">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="vehicle.year">                                    <label for="year">Year</label>
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
    name: "EditVehicle",
    data() {
        return {
            vehicle:{
                brand: "",
                year: "",
            },
            invalidYear: false
        };
    },
    mounted() {
        this.showVehicle();
    },
    methods: {
        async showVehicle() {
            try {
                const response = await axios.get(`vehicles/${this.$route.params.id}`);
                const { brand, year } = response.data;
                this.vehicle.brand = brand;
                this.vehicle.year = year;
            } catch (error) {
                console.error("Error fetching vehicle data:", error);
            }
        },
        validateYear(year) {
        const parsedYear = parseInt(year);
    if (isNaN(parsedYear)) {
    }
    return parsedYear >= 1900 && parsedYear <= new Date().getFullYear();
},
        async edit() {
            // Validación del año
            if (!this.validateYear(this.vehicle.year)) {
                this.invalidYear = true;
                return;
            } else {
                this.invalidYear = false;
            }

            try {
                console.log("Sending PUT request...");
                console.log("Data to be sent:", {
                    brand: this.vehicle.brand,
                    year: this.vehicle.year
                 });

                await axios.put(`vehicles/${this.$route.params.id}`, this.vehicle);
                console.log("PUT request successful.");
                this.$router.push({ name: "showVehicle" });
            } catch (error) {
                console.error("Error updating vehicle:", error);
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
