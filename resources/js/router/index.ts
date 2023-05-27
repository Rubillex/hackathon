import { createRouter, createWebHistory } from 'vue-router';

import { ROUTES } from './routeList';
import user from "../store/modules/user";
import { authMiddleware } from '../middlewares';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: ROUTES.profile,
            name: 'profile',
            component: () => import('../views/profile.vue'),
            beforeEnter: authMiddleware
        },
        {
            path: ROUTES.courses,
            name: 'courses',
            component: () => import('../views/courses.vue'),
            beforeEnter: authMiddleware
        },
        {
            path: ROUTES.lk,
            name: 'lk',
            component: () => import('../views/lk.vue'),
            beforeEnter: authMiddleware
        },
    ]
});

let firstLoad = true;
router.beforeEach(async (to, from, next) => {
    if (firstLoad) {
        firstLoad = false;

        const store = user();
        const payload = {
            email: 'test@test.test',
            password: 'password'
        };
        await store.login(payload);
        await store.getProfileData();
    }

    return next();
});

export default router;
