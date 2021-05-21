<template>

<div class="ChallengeSet">
    <div class="ChallengeSetName">
        {{ChallengeSetName}}
    </div>
    <div class="ChallengeSetLine"></div>
    <button class="dropdown">
        <img class="dropdownIcon" v-if="ChallengeSetShow" @click="ChallengeSetShow = !ChallengeSetShow" src="../../../assets/downvote.png" alt="">

        <img class="dropdownIcon" v-if="!ChallengeSetShow" @click="ChallengeSetShow = !ChallengeSetShow" src="../../../assets/upvote.png" alt="">
    </button>
    
</div>
<div v-if="ChallengeSetShow">
    <li :key="challenge" v-for="challenge in Challenges">
        <Challenge :ChallengeName="challenge.name" :ChallengeCansNeeded="challenge.cans_needed_to_unlock" :ChallengeDescription="challenge.description" :ChallengeDifficulty="challenge.difficulty" :ChallengeID="challenge.id" :ChallengePoints="challenge.points"></Challenge>
    </li>
</div>
    
</template>

<script>

import Challenge from './ChallengeItem.vue'

export default {
    name: 'ChallengeSet',
    components: {
        Challenge,
    },
    props: {
        CategoryName: String,
        CategoryPoints: Number,
        CategoryID: Number,

        ChallengeSetID: Number,
        ChallengeSetName: String,
        ChallengeSetEventID: Number,
        ChallengeSetLength: Number,
        ChallengeSetDifficulty: Number,

    },
    data:function() {
        return {
            ChallengeSetShow: true,
            Challenges: [],
        }
    },
    methods: {
        getChallenges(){
            axios.post('api/getchallenges', {challengesetid: this.ChallengeSetID }).then(response => {
                this.Challenges=response.data.challenges;
            }).catch(error => {
                console.log("Error, Challenges not obtained");
            });
        },
    },
    created() {
        
    },
    mounted() {
        this.getChallenges();
    }
    
}
</script>

<style scoped>
.ChallengeSet {
    width: 86%;
    height: 20px;
    
    position: relative;
    left: 7%;
    margin-top: 15px;
    margin-bottom: 5px;

    border-bottom: 1px solid white;
}

.ChallengeSetName  {
    font-family: "Akzidenz Bold";
    font-size: 14px;
    letter-spacing: 2px;
    color: white;

    text-align: left;
    position: absolute;
    left: 1%;

}

.dropdown {
    background-color: transparent;
    border: none;
}

.dropdownIcon {
    height: 8px;

    position: absolute;
    right: 8%;
    top: 0px;
}

</style>