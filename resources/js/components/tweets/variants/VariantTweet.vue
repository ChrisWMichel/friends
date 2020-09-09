<template>
 <div class="flex w-full">
   <div class="mr-3">
       <img :src="tweet.user.avatar" class="w-12 rounded-full">
   </div>
   <div class="flex-grow">
       <tweet-username :user="tweet"></tweet-username>
       <p class="text-gray-300 whitespace-pre-wrap">{{tweet.body}}</p>


       <action-group :tweet="tweet"></action-group>
   </div>
 </div>
</template>

<script>
import TweetUsername from "../TweetUsername";
import ActionGroup from "../actions/ActionGroup";
export default {
    name: "VariantTweet",
    components: {ActionGroup, TweetUsername},
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
       // console.log('likes', this.tweet)
    }
}
</script>

<style scoped>

</style>
