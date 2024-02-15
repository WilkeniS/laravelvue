const show   = ()=> import('./Components/Show.vue');
const create = ()=> import('./components/Create.vue');
const edit   = ()=> import('./components/Edit.vue');
 
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
    }

    
];
