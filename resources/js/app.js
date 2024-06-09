import './bootstrap';
import Vue from 'vue';
import CarComponent from './components/CarComponent.vue';

const app = new Vue({
    el: '#app',
    components: {
        CarComponent
    }
});

