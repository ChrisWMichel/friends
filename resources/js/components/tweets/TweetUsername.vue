<template>
    <div>
        <span class="text-gray-300 font-bold">{{user.user.name}}</span> <span class="text-gray-600">@{{user.user.username}}</span>
        <span class="float-right text-gray-600">{{ user.diffForHumans | formatDate }}</span>
    </div>
</template>

<script>


export default {
    name: "TweetUsername",
    props:{
        user:{
            required:true,
            type:Object
        }
    },
    data(){
        return{
            tweetDate:''
        }
    },
    created() {
       // this.tweetDate = moment(this.user.created_at).format('lll');
       // this.tweetDate = moment(this.user.created_at).diffForHumans;
    }
}
</script>

<style scoped>

</style>
