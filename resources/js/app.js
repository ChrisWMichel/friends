require('./bootstrap');

window.Vue = require('vue');
import router from './router/router';
import store from './store'
import VueObserveVisibility from 'vue-observe-visibility'

Vue.use(VueObserveVisibility)

Vue.prototype.$user = User;

 const files = require.context('./', true, /\.vue$/i)
 files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//Vue.component('index', require('./components/Index.vue').default);



const app = new Vue({
    el: '#app',
    router,
    store
});
