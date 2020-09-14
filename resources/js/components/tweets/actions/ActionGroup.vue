<template>
    <ul class="flex mt-4">
        <li class="w-3/12">
           <reply-action :tweet="tweet"></reply-action>
        </li>
        <li class="w-3/12">
            <retweet-action :tweet="tweet"></retweet-action>
        </li>
        <li class="w-3/12">
           <like-action :tweet="tweet"></like-action>
        </li>
    </ul>
</template>

<script>
import ReplyAction from "./ReplyAction";
import RetweetAction from "./RetweetAction";
import LikeAction from "./LikeAction";
export default {
    name: "ActionGroup",
    components: {LikeAction, RetweetAction, ReplyAction},
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
}
</script>

<style scoped>

</style>
