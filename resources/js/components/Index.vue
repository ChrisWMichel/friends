<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Home</div>

                        <div class="card-body">
                            user: {{user}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
       <!-- <router-link :to="{name:'home'}">Home</router-link>
        <router-link :to="{name:'home2'}">Second</router-link>

        <router-view></router-view>-->
    </div>

</template>

<script>

export default {
    name: "Index",
    data(){
        return {
            user:null
        }
    },
    methods:{
        async getUser(){
            const response = await axios.get('/api/user')
            this.user = response.data;
        }
    }
}
</script>

<style scoped>

</style>
