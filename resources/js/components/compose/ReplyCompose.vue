<template>
    <div>
        <form class="flex" @submit.prevent="submit">

            <img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full">

            <div class="flex-grow">

                <compose-textarea placeholder="Tweet reply" v-model="form.body"></compose-textarea>

                <app-progressbar class="mb-4" :progress="media.progress" v-if="media.progress"></app-progressbar>

                <image-preview @removed="removeImage" v-if="media.images.length" :images="media.images"></image-preview>

                <video-preview @removed="removeVideo" v-if="media.video" :video="media.video"></video-preview>

                <div class="flex justify-between">
                    <ul class="flex items-center">
                        <li class="mr-4">
                            <media-button
                                id="media-compose-reply"
                                @selected="handleMediaSelected"
                            ></media-button>
                        </li>
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
                        >Reply</button>
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
import {mapActions} from "vuex";
export default {
    name: "ReplyCompose",
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
            replyToTweet: 'timeline/replyToTweet'
        }),
        async post(){
            await this.replyToTweet({
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
