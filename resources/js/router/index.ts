import { createRouter, createWebHistory } from 'vue-router';

import { ROUTES } from './routeList';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: ROUTES.profile,
            name: 'profile',
            component: () => import('../views/profile.vue'),
        },
        {
            path: ROUTES.courses,
            name: 'courses',
            component: () => import('../views/courses.vue'),
        },
    ]
});

let firstLoad = true;
router.beforeEach(async (to, from, next) => {
    // if (firstLoad) {
    //     firstLoad = false;
    //
    //     const store = userStore();
    //     await store.getProfileData();
    // }

    return next();
});

export default router;
