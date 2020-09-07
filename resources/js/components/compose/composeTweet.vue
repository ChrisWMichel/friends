<template>
    <div>
        <form class="flex" @submit.prevent="submit">
            <div class="mr-3">
                <img :src="$user.avatar" class="w-12 rounded-full">
            </div>
            <div class="flex-grow">

               <compose-textarea v-model="form.body"></compose-textarea>

                <div class="flex justify-between">
                    <div>
                        actions
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none"
                        >Tweet</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import ComposeTextarea from "./composeTextarea";
export default {
    name: "composeTweet",
    components: {ComposeTextarea},
    data(){
        return {
            form:{
                body:''
            }
        }
    },
    methods:{
        async submit(){
            await axios.post(`/api/tweets`, this.form)
            .then(resp => {
                this.form.body = '';
            })
        }
    }
}
</script>

<style scoped>

</style>
