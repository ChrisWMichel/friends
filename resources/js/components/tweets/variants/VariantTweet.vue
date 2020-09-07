<template>
     <div class="flex w-full">
           <div class="mr-3">
               <img :src="tweet.user.avatar" class="w-12 rounded-full">
           </div>
           <div class="flex-grow">
               <tweet-username :user="tweet"></tweet-username>
               <p class="text-gray-300 whitespace-pre-wrap">{{tweet.body}}</p>
           </div>
       </div>
</template>

<script>
import TweetUsername from "../TweetUsername";
export default {
    name: "VariantTweet",
    components: {TweetUsername},
    props:{
        tweet:{
            required:true,
            type:Object
        }
    },
    data(){
        return{

        }
    }
}
</script>

<style scoped>

</style>
