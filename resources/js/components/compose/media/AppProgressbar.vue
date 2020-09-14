<template>
    <div class="w-full h-1 bg-gray-800">
        <div class="h-5 bg-blue-500" :style="`width: ${progress}%`">
            <div class="pl-2">{{progressBar}}%</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppProgressbar",
    props:{
        progress:{
            required:true,
            type: Number
        }
    },
    computed:{

        progressBar(){
            return this.progress;
        }
    }
}
</script>

<style scoped>

</style>
