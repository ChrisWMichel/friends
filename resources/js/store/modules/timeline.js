import axios from 'axios'

export default{
    namespaced: true,

    state: {
        tweets:[]
    },
    getters:{
        tweets(state){
            return state.tweets.sort((a, b) => b.created_at - a.created_at)
        }

    },
    mutations:{
        PUSH_TWEETS(state, data){
        state.tweets.push(
            ...data.filter(tweet => {
                return !state.tweets.map(t => t.id).includes(tweet.id)
            })
        )
            //state.tweets = data
        }
    },
    actions:{
        async getTweets({commit}, url){
            const resp = (await axios.get(url)).data;

            commit('PUSH_TWEETS', resp.data);
            return resp;
        }
    }
}
