import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/user/signup',
        name: 'UserSignUp',
        component: () => import('@/pages/users/SignUp.vue')
    }
]

const router = createRouter({
    routes,
    history: createWebHistory(),
})
export default router;