import ExampleComponent from './components/ExampleComponent.vue';
import { createRouter, createWebHistory } from 'vue-router'; 


const show   = ()=> import('./Components/Show.vue');
const create = ()=> import('./components/Create.vue');
const edit   = ()=> import('./components/Edit.vue');
const clients   = ()=> import('./components/Clients.vue');
const createClients   = ()=> import('./components/createClients.vue');
const editClients   = ()=> import('./components/editClients.vue');

 
 const routes =[

    {
        name: 'showVehicle',
        path: '/',
        component: show
    },

    {
        name: 'CreateVehicle',
        path: '/create',
        component: create
    },

    {
        name: 'EditVehicle',
        path: '/:id',
        component: edit
    },

    {
        name: 'showClients',
        path: '/clients',
        component: clients
    },

    {
            name: 'editClient',
            path: '/:id',
            component: editClients
    },

    {
        name: 'CreateClients',
        path: '/clients/create',
        component: createClients
    }

    

    
];

const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router;
