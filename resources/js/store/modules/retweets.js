import axios from 'axios'
import {without} from 'lodash';

export default{
    namespace:true,

    state: {
        retweets:[]
    },
    getters:{
        getRetweets:state => state.retweets
    },
    mutations:{
        PUSH_RETWEETS(state, data){
            state.retweets.push(...data)
        },
        ADD_RETWEET(state, id){
            state.retweets.push(id);
        },
        REMOVE_RETWEET(state, id){
            state.retweets = without(state.retweets, id)
        }
    },
    actions:{
        async retweet(_, tweet){
            await axios.post(`/api/tweets/${tweet.id}/retweets`)
        },
        async unretweet(_, tweet){
            await axios.delete(`/api/tweets/${tweet.id}/retweets`)
        },

        syncRetweet({commit, state}, id){
            if(state.retweets.includes(id)){
                commit('REMOVE_RETWEET', id)
            } else {
                commit('ADD_RETWEET', id)
            }
        }
    },
    modules:{

    }
}
