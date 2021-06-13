<template>
    <div class="challenge-select-wrapper">
        <transition name="slide" mode="out-in">
            <div class="categories" v-if="showCategories"> 
                <div class="title">Select Category:</div>
                <button @click="toChallengeSets">Next</button>
            </div>
        </transition>
        <transition name="slide" mode="out-in">
            <div class="challenge-sets" v-if="showChallengeSets">
                <div class="title">Select Challenge Set:</div>
            </div>
        </transition>
        <transition name="slide" mode="out-in">
            <div class="challenges" v-if="showChallenges">
                <div class="title">Select Challenge:</div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name:'ChallengeSelect',
    components: {

    },
    props: {

    },
    data:function() {
        return  {
            showCategories: true,
            showChallengeSets: false,
            showChallenges:false,

            ChallengesPage: [],
            
            ChallengeSet: [],
            Challenges: [],
            Category: [],

            FinalCategory: 0,
            FinalChallengeSet: 0,
            FinalChallenge: 0,
        }
    },
    methods: {
        getChallengesPage() {
            axios.get('api/getchallengespage').then(response => {
                console.log(response.data);
                this.ChallengesPage = response.data.challengespage;
                console.log("All Challenges Obtained");
            }).catch(error => {
                console.log("Error, All challenges not obtained");
            });
        },
        getChallenges(){
            axios.post('api/getchallenges', {challengesetid: this.id }).then(response => {
                this.ChallengeSet=response.data.challengeset;
                this.Challenges=response.data.challenges;
                this.Event=response.data.event;
                this.Category = response.data.category;
                console.log(response);
            }).catch(error => {
                console.log("Error, Challenges not obtained");
            });
        },


        toChallengeSets(){
            this.showCategories = false;
            this.showChallengeSets = true;
        },

    },
    created() {
        this.getChallengesPage();
    },
    mounted() {

    },
}
</script>

<style scoped>

.slide-enter-active,
.slide-leave-active {
  transition: all 0.75s ease-out;
}


.slide-enter-to {
  position: absolute;
  right: 0;
}


.slide-enter-from {
  position: absolute;
  right: -100%;
}


.slide-leave-to {
  position: absolute;
  left: -100%;
}


.slide-leave-from {
  position: absolute;
  left: 0;
}

.title {
    font-family: "Akzidenz Bold Extended";
    font-size: 22px;
    color: white;
}

</style>