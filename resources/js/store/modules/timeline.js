import axios from 'axios';
import {get} from 'lodash';

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
        },
        SET_LIKES(state, {id, count}){
            state.tweets = state.tweets.map(tweet => {
                if(tweet.id === id){
                    tweet.like_cnt = count
                }
                if(get(tweet.original_tweet, 'id') === id){
                    tweet.original_tweet.like_cnt = count;
                }
                return tweet;
            })
        }
    },
    actions:{
        async getTweets({commit}, url){
            const resp = (await axios.get(url)).data;

            commit('PUSH_TWEETS', resp.data);
            commit("PUSH_LIKES", resp.meta.likes, {root:true});

            return resp;
        }
    }
}
