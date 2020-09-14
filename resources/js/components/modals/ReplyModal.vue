<template>
    <div>
        <reply-compose :tweet="tweet"  @success="$emit('close')" v-if="tweet"></reply-compose>
        <component
            v-if="tweet"
            :is="`variant-${tweet.type}`"
            :tweet="tweet"
            class="mb-4"
        />
    </div>
</template>

<script>

import ReplyCompose from "../compose/ReplyCompose";
export default {
    name: "RetweetModal",
    components: {ReplyCompose},
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
