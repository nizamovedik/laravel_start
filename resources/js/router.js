import {createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/admin/sections',
        component: () => import('./views/Section/Index.vue'),
        name: 'section.index'
    },
    {
        path: '/admin/sections/create',
        component: () => import('./views/Section/Create.vue'),
        name: 'section.create'
    },
    {
        path: '/admin/sections/:id',
        component: () => import('./views/Section/Show.vue'),
        name: 'section.show'
    },
    {
        path: '/admin/sections/:id/edit',
        component: () => import('./views/Section/Edit.vue'),
        name: 'section.edit'
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
