<template>
    <div>
        <retweet-compose :tweet="tweet" @success="$emit('close')"></retweet-compose>
        <component
            v-if="tweet"
            :is="`variant-${tweet.type}`"
            :tweet="tweet"
            class="border border-gray-700 rounded-lg mt-4 p-4"
        />
    </div>
</template>

<script>
import RetweetCompose from "../compose/RetweetCompose";
export default {
    name: "RetweetModal",
    components: {RetweetCompose},
    props:{
        tweet:{
            required:true,
            type:Object
        }
    }
}
</script>

<style scoped>

</style>
