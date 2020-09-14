<template>
    <div class="flex w-full">
        <!--<div class="mr-3">-->
            <img :src="tweet.user.avatar" class="w-12 h-12 mr-3 rounded-full">
        <!--</div>-->
        <div class="flex-grow">
            <tweet-username :user="tweet"></tweet-username>

            <p class="text-gray-300 whitespace-pre-wrap">{{tweet.body}}</p>

            <tweet
                class="border border-gray-700 rounded-lg mt-4"
                :tweet="tweet.original_tweet"
            ></tweet>
            <action-group :tweet="tweet"></action-group>
        </div>
    </div>
</template>

<script>
import TweetUsername from "../TweetUsername";
import Tweet from "../Tweet";
import ActionGroup from "../actions/ActionGroup";

export default {
    name: "VariantQuote",
    components: {Tweet, TweetUsername, ActionGroup},
    props:{
        tweet:{
            required:true,
            type:Object
        }
    },
    data(){
        return{

        }
    },
    created() {
        //this.tweet.original_tweet.type = 'tweet';
        //console.log('original_tweet', this.tweet.original_tweet)
    }
}
</script>

<style scoped>

</style>
