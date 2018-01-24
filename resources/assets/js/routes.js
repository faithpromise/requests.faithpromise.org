import ticketLayout from './layouts/ticket-form-layout';
import home from './route_components/route-home.vue';
import creative from './route_components/route-creative.vue';
import tech from './route_components/route-tech.vue';

// import NProgress from 'nprogress';

const routes = [

    {
        name:      'home',
        path:      '/',
        component: home,
    },

    {
        path:      '/',
        component: ticketLayout,
        children:  [
            { name: 'home', path: '', component: home },
            { name: 'tech', path: '/tech', component: tech },
            { name: 'creative', path: '/creative', component: creative },
            { name: 'web', path: '/web', component: creative },
            { name: 'resources', path: '/resources', component: creative },
            { name: 'facility', path: '/facility', component: creative },
            { name: 'worship-tech', path: '/worship-tech', component: creative },
        ],
    },
];

const router = new VueRouter({
    routes:         routes.concat([]),
    base:           '/',
    mode:           'history',
    scrollBehavior: (to, from, savedPosition) => {
        return savedPosition ? savedPosition : { x: 0, y: 0 }
    }
});

router.beforeEach((to, from, next) => {

    // NProgress.start();

    next();

});

router.afterEach(() => {
    // NProgress.done();
});

export default router;
