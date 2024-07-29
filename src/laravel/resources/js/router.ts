import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/user/signup',
        name: 'UserSignUp',
        component: () => import('@/pages/user/SignUp.vue')
    },
    {
        path: '/user/sample',
        name: 'SampleView',
        component: () => import('@/pages/user/SampleView.vue')
    }
]

const router = createRouter({
    routes,
    history: createWebHistory(),
})
export default router;