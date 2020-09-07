<template>
    <div>
        <span class="text-gray-300 font-bold">{{user.user.name}}</span> <span class="text-gray-600">@{{user.user.username}}</span>
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

        }
    }
}
</script>

<style scoped>

</style>
