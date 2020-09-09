<template>
    <a href="#" class="flex items-center text-base" @click.prevent="likeOrUnlike">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            class="fill-current text-gray-600 w-5 mr-2"
            :class="{'text-red-600':liked}"
        >
            <path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"/>
        </svg>
        <span
            class=" text-gray-600"
            :class="{'text-red-600':liked}"
        >{{tweet.like_cnt}}</span>
    </a>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name: "LikeAction",
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
    computed:{
        ...mapGetters({
            getLikes:'getLikes'
        }),
        liked(){
            return this.getLikes.includes((this.tweet.id));
        }
    },
    methods:{
        ...mapActions(['likeTweet', "unlikeTweet"]),
        likeOrUnlike(){
           if(this.liked){
               this.unlikeTweet(this.tweet)
           } else {
               this.likeTweet(this.tweet)
           }
        }
    }
}
</script>

<style scoped>

</style>
