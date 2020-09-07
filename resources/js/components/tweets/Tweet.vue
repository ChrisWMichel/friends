<template>
    <div class="w-full inline-block p-4 border border-gray-800 cursor-pointer hover:bg-gray-800">

        <component
            :is="`variant-${tweet.type}`"
            :tweet="tweet"
        />
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
    },
    created() {

    }
}
</script>

<style scoped>

</style>
