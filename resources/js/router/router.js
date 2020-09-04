import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//import Home from './components/ExampleComponent'

const routes = [
   // { path: "/", component:Home, name: 'home'}
]


const router = new VueRouter({
    routes,
    hashbang : false,
    mode: 'history',
    scrollBehavior(to, from, savedPosition){
        if(savedPosition){
            return savedPosition;
        }
        if(to.hash){
            return {selector: to.hash};
        }
        return {x: 0, y:0};
    }
});

export default router;
