import Vue from 'vue';
import App from './views/App';
import router from './router/index';
import store from './store/store'
import axios from 'axios';
import Toasted from 'vue-toasted';
import VueHtmlToPaper from 'vue-html-to-paper';

const options = {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes'
    ],
    styles: [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'https://unpkg.com/kidlat-css/css/kidlat.css'
    ]
}

Vue.use(VueHtmlToPaper, options);

axios.defaults.baseURL = `/api`;
window.axios = axios;
window.eventBus = new Vue();

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

Vue.use(Toasted, {
    duration: 1500
});

router.beforeEach((to, from, next) => {
    // check if the route requires authentication and user is not logged in
    if (to.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        // redirect to login page
        next({name: 'Login'});
        return
    }

    // if logged in redirect to dashboard
    if (to.path === '/login' && store.state.isLoggedIn) {
        next({name: 'Dashboard'});
        return
    }

    next()
});

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
