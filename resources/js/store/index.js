import Vue from 'vue'
import Vuex from 'vuex'
import timeline from "./modules/timeline";
import likes from "./modules/likes";

Vue.use(Vuex)

export default new Vuex.Store({

    modules: {
       timeline,
       likes
    }
})
