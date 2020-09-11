<template>
    <div>
        <form class="flex" @submit.prevent="submit">

            <img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full">

            <div class="flex-grow">

               <compose-textarea v-model="form.body"></compose-textarea>

                <image-preview @removed="removeImage" v-if="media.images.length" :images="media.images"></image-preview>

                <video-preview @removed="removeVideo" v-if="media.video" :video="media.video"></video-preview>

                <div class="flex justify-between">
                    <ul class="flex items-center">
                       <li class="mr-4">
                           <media-button
                               id="media-compose"
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
                        >Tweet</button>
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
export default {
    name: "composeTweet",
    components: {ImagePreview, Index, MediaButton, ComposeLimit, ComposeTextarea, VideoPreview},
    data(){
        return {
            form:{
                body:'',
                media:[]
            },
            media:{
                images:[],
                video: null
            },
            mediaTypes:{}
        }
    },
    methods:{
        async submit(){
            await axios.post(`/api/tweets`, this.form)
            .then(resp => {
                this.form.body = '';
            })
        },
        async getMediaTypes(){
            this.mediaTypes = (await axios.get('/api/media/types')).data.data;

        },
        handleMediaSelected(files){
            Array.from(files).slice(0, 4).forEach(file => {
                if(this.mediaTypes.images.includes((file.type))){
                    this.media.images.push(file);
                }
                if(this.mediaTypes.videos.includes((file.type))){
                    this.media.video = file;
                    console.log('this.media.video', this.media.video);
                }
            })

            if(this.media.vide){
                this.media.images = [];
            }
        },
        removeVideo(){
            this.media.video = null;
        },
        removeImage(image){
            this.media.images = this.media.images.filter(i => {
                return i !== image
            })
        }
    },
    mounted(){
        this.getMediaTypes()
    },
    computed:{
        tooLong(){
          return this.form.body.length > 281;
        }
    }
}
</script>

<style scoped>

</style>
