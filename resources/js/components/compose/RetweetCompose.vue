<template>
    <div>
        <form class="flex" @submit.prevent="submit">

            <img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full">

            <div class="flex-grow">

                <compose-textarea placeholder="Add a comment" v-model="form.body"></compose-textarea>

                <div class="flex justify-between">
                    <ul class="flex items-center">

                    </ul>
                    <div class="flex items-center justify-end">
                        <div>
                            <compose-limit class="mr-2" :body="form.body"></compose-limit>
                        </div>
                        <button
                            type="submit"
                            :disabled="tooLong"
                            class="rounded-full text-center px-4 py-3 font-bold leading-none"
                            :class="{
                                'bg-gray-700 text-black-300': tooLong,
                                'bg-blue-500 text-gray-300':!tooLong
                            }"
                        >Retweet</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import ComposeTextarea from "./composeTextarea";
import ComposeLimit from "./ComposeLimit";
import MediaButton from "./media/MediaButton";
import Index from "../Index";
import ImagePreview from "./media/ImagePreview";
import VideoPreview from "./media/VideoPreview";
import AppProgressbar from "./media/AppProgressbar";
import compose from "../../mixins/compose";
import {mapActions} from 'vuex';

export default {
    name: "RetweetCompose",
    components: {AppProgressbar, ImagePreview, Index, MediaButton, ComposeLimit, ComposeTextarea, VideoPreview},
    mixins:[compose],
    props:{
        tweet:{
            required:true,
            type:Object
        }
    },
    methods:{
        ...mapActions({
            quoteTweet: 'timeline/quoteTweet'
        }),
        async post(){
            await this.quoteTweet({
                tweet: this.tweet,
                data: this.form
            })

            this.$emit('success')
        },

    }

}
</script>

<style scoped>

</style>
