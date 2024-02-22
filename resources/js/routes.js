const show   = ()=> import('./Components/Show.vue');
const create = ()=> import('./components/Create.vue');
const edit   = ()=> import('./components/Edit.vue');
const clients   = ()=> import('./components/Clients.vue');
const createClients   = ()=> import('./components/createClients.vue');

 
export const routes =[

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
        path: '/edit/:id',
        component: edit
    },

    {
        name: 'showClients',
        path: '/clients',
        component: clients
    },

    {
        name: 'CreateClients',
        path: '/clients/create',
        component: createClients
    }

    
];
