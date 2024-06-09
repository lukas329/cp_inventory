<template>
    <div>
        <h1>Car Management</h1>
        <div v-for="car in cars" :key="car.id">
            <p>{{ car.name }} ({{ car.registration_number }}) - Registered: {{ car.is_registered ? 'Yes' : 'No' }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cars: [],
        };
    },
    mounted() {
        this.getCars();
    },
    methods: {
        getCars() {
            axios.get('/api/cars').then(response => {
                this.cars = response.data;
            });
        },
    },
};
</script>

<style scoped>
/* Add component-specific styles here */
</style>
