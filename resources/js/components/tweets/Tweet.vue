<template>
    <div class="w-full inline-block p-4 border border-gray-800 cursor-pointer hover:bg-gray-800">
        <div class="flex w-full">
            <div class="mr-3">
                <img :src="tweet.user.avatar" class="w-12 rounded-full">
            </div>
            <div>
                <tweet-username :user="tweet"></tweet-username>
                <p class="text-gray-300 whitespace-pre-wrap">{{tweet.body}}</p>
            </div>
        </div>
    </div>
</template>

<script>
import TweetUsername from "./TweetUsername";
export default {
    name: "Tweet",
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
