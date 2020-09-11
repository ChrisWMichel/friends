<template>
    <div class="h-10 w-10 relative">
        <svg class="transform -rotate-90" viewBox="0 0 120 120">
            <circle :r="radius" cx="60" cy="60" fill="none" stroke-width="8" class="stroke-current text-gray-700"/>

            <circle
                :r="radius"
                cx="60"
                cy="60"
                fill="none"
                stroke-width="8"
                class="stroke-current text-blue-500"
                :class="{
                    '!text-red-500':percentageIsOver
                }"
                :stroke-dasharray="dash"
                :stroke-dashoffset = offset
            />
        </svg>
    </div>
</template>

<script>
export default {
    name: "ComposeLimit",
    props:['body'],
    data(){
        return{
            radius: 30
        }
    },
    computed:{
        dash(){
            return 2 * Math.PI * this.radius
        },
        percentageIsOver(){
            return this.percentage > 100;
        },
        percentage(){
            return Math.round((this.body.length * 100) / 280)
        },
        displayPercentage(){
            return this.percentage <= 100 ? this.percentage : 100
        },
        offset(){
            let circle = this.dash;
            let progress = this.displayPercentage / 100;

            return circle * (1 - progress)
        }
    }
}
</script>

<style scoped>

</style>
