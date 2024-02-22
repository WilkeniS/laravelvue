<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 18rem;">
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
                                    <textarea class="form-control" v-model="vehicle.year"></textarea>
                                    <label for="year">Year</label>
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
    name: "EditVehicle",
    data() {
        return {
            vehicle:{
                brand: "",
                year: "",
            }
        };
    },
    mounted() {
        this.showVehicle();
    },
    methods: {
        async showVehicle() {
            try {
                const response = await axios.get(`vehicles/${this.$route.params.id}`)
                const { brand, year } = response.data;
                this.vehicle.brand = brand;
                this.vehicle.year = year;
            } catch (error) {
                console.error("Error fetching vehicle data:", error);
            }
        },
        async edit() {
            try {
                await axios.put(`vehicles/${this.$route.params.id}`, {
                    brand: this.vehicle.brand,
                    year: this.vehicle.year
                });
                this.$router.push({ name: "showVehicle" });
            } catch (error) {
                console.error("Error updating vehicle:", error);
            }
        }
    }
};
</script>
