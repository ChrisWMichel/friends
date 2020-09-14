<template>
    <div>
        <app-drop-down v-if="!retweeted">
            <template slot="trigger">
                <retweet-button :tweet="tweet"></retweet-button>
            </template>

            <app-drop-down-item @click.prevent="retweetOrUnretweet">Retweet</app-drop-down-item>
            <app-drop-down-item @click.prevent="$modal.show(RetweetModal, {tweet})">Retweet with comment</app-drop-down-item>

        </app-drop-down>
        <retweet-button v-else :tweet="tweet" @click.prevent="retweetOrUnretweet"></retweet-button>
    </div>
</template>

<script>
import AppDropDown from "../../dropdown/AppDropDown";
import AppDropDownItem from "../../dropdown/AppDropDownItem";
import {mapGetters, mapActions} from 'vuex';
import RetweetButton from "./RetweetButton";
import RetweetModal from "../../modals/RetweetModal";
export default {
    name: "RetweetAction",
    components: {RetweetButton, AppDropDownItem, AppDropDown, RetweetModal},
    props:{
        tweet:{
            required:true,
            type:Object
        }
    },
    data(){
        return{
            RetweetModal
        }
    },
    computed:{
        ...mapGetters({
            getRetweets:'getRetweets'
        }),
        retweeted(){
            return this.getRetweets.includes((this.tweet.id));
        }
    },
    methods:{
        ...mapActions(['retweet', "unretweet"]),
        retweetOrUnretweet(){
            if(this.retweeted){
                this.unretweet(this.tweet)
            } else {
                this.retweet(this.tweet)
            }
        }
    }

}
</script>

<style scoped>

</style>
