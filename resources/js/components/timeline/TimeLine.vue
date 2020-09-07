<template>
    <div>
        <div class="border-b-8 border border-gray-800 p-4 w-full">
            <compose-tweet></compose-tweet>
        </div>
        <tweet v-for="(tweet, index) in tweets" :key="index" :tweet="tweet"></tweet>

        <div v-if="tweets.length" v-observe-visibility="{
            callback: visibilityChanged
        }"></div>
    </div>
</template>

<script>
import Tweet from "../tweets/Tweet";
import {mapGetters, mapActions, mapMutations} from 'vuex';
import ComposeTweet from "../compose/composeTweet";

export default {
    name: "TimeLine",
    components: {ComposeTweet, Tweet},
    data(){
        return{
            page:1,
            lastPage:1
        }
    },
    computed:{
        ...mapGetters({
            tweets: 'timeline/tweets'
        }),
        urlWithPage(){
            return `/api/timeline?page=${this.page}`
        }

    },
    methods:{
        ...mapActions({
            getTweets: 'timeline/getTweets'
        }),
        ...mapMutations({
            PUSH_TWEETS: 'timeline/PUSH_TWEETS'
        }),
        loadTweets(){
            console.log('page', this.page);
            this.getTweets(this.urlWithPage).then(resp =>{
                this.lastPage = resp.meta.last_page;
            })
        },
        visibilityChanged (isVisible) {
            if(!isVisible){
                return;
            }
            if(this.lastPage === this.page){
                return;
            }
            this.page++;
           this.loadTweets()
        }
    },
    mounted() {
        this.loadTweets();

        Echo.private(`timeline.${this.$user.id}`)
        .listen('.TweetWasCreated', e => {
            this.PUSH_TWEETS([e]);
        })
    }
}
</script>

<style scoped>

</style>
