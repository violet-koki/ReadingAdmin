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
    },
    {
        path: '/user/circle',
        name: 'Circle',
        component: () => import('@/pages/user/Circle.vue')
    },
    {
        path: '/user/search-for-post',
        name: 'SearchForPost',
        component: () => import('@/pages/user/SearchForPost.vue')
    },
        {
        path: '/user/new-post',
        name: 'NewPost',
        component: () => import('@/pages/user/NewPost.vue')
    }
]

const router = createRouter({
    routes,
    history: createWebHistory(),
})
export default router;