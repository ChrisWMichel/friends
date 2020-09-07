import axios from 'axios'

export default{
    namespaced: true,

    state: {
        tweets:[]
    },
    getters:{
        tweets: state => state.tweets

    },
    mutations:{
        PUSH_TWEETS(state, data){
        state.tweets.push(...data)
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
