import axios from 'axios'
import {without} from 'lodash';

export default{
    namespace:true,

    state: {
        likes:[]
    },
    getters:{
        getLikes:state => state.likes
    },
    mutations:{
        PUSH_LIKES(state, data){
            state.likes.push(...data)
        },
        ADD_LIKE(state, id){
            state.likes.push(id);
        },
        REMOVE_LIKE(state, id){
            state.likes = without(state.likes, id)
        }
    },
    actions:{
        async likeTweet(_, tweet){
            await axios.post(`/api/tweets/${tweet.id}/likes`)
        },
        async unlikeTweet(_, tweet){
            await axios.delete(`/api/tweets/${tweet.id}/likes`)
        },

        syncLike({commit, state}, id){
            if(state.likes.includes(id)){
                commit('REMOVE_LIKE', id)
            } else {
                commit('ADD_LIKE', id)
            }
        }
    },
    modules:{

    }
}
