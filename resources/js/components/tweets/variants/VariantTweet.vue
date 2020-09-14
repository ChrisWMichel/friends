<template>
 <div class="flex w-full">
     <!--<div class="mr-3">-->
        <img :src="tweet.user.avatar" class="w-12 h-12 mr-3 rounded-full">
     <!--</div>-->

   <div class="flex-grow">
       <tweet-username :user="tweet"></tweet-username>
       <p class="text-gray-300 whitespace-pre-wrap">{{tweetUpdate.body}}</p>

       <div class="flex flex-wrap mb-4 mt-4" v-if="images.length">
            <div class="w-6/12 flex-grow" v-for="(image, index) in images" :key="index">
                <img :src="image.url" class="rounded-lg"/>
            </div>
       </div>
       <div class="mb-4 mt-4" v-if="video">
            <video :src="video.url" controls class="rounded-lg"></video>
       </div>


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
    },
    computed:{
        tweetUpdate(){
            return this.tweet
        },
        images(){
            return this.tweet.media.data.filter(x => x.type === 'image');
        },
        video(){
            return this.tweet.media.data.filter(x => x.type === 'video')[0];
        }
    }
}
</script>

<style scoped>

</style>
