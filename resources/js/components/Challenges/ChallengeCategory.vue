<template>

<div class="category">
    <img v-if="!CategoryFavourite" class="favourite" src="../../../assets/star-regular.svg" alt="">
    <div class="categoryName">
        {{CategoryName}}
    </div>
    <!--<div class="categoryPoints">
        {{CategoryPoints}}
    </div>-->
    <button class="dropdown">
        <img class="dropdownIcon" v-if="ShowCategory" @click="ShowCategory = !ShowCategory" src="../../../assets/downvote.png" alt="">

        <img class="dropdownIcon" v-if="!ShowCategory" @click="ShowCategory = !ShowCategory" src="../../../assets/upvote.png" alt="">
    </button>
</div>
<div v-if="ShowCategory">
    <li class="ChallengeSet" :key="challengeset" v-for="challengeset in ChallengeSets">
        <div v-if="CategoryID == challengeset.category_id">
            <ChallengeSet :ChallengeSetName="challengeset.name" :ChallengeSetID="challengeset.id"></ChallengeSet>
        </div>
    </li>
</div>
    
</template>

<script>

import ChallengeSet from './ChallengeSet.vue'

export default {
    name: 'ChallengeCategory',
    components: {
        ChallengeSet,
    },
    props: {
        CategoryName: String,
        CategoryPoints: Number,
        CategoryID: Number,
        CategoryFavourites: Array,

        
    },
    data:function() {
        return {
            ShowCategory: true,
            ChallengeSets: [],
            CategoryFavourite: false,
        }
    },
    methods: {
        getChallengeSets(){
            axios.get('api/getchallengesets').then(response => {
                this.ChallengeSets=response.data.challengesets;
                console.log("Challenge Sets Obtained");
            }).catch(error => {
                console.log("Error, Challenge Sets not obtained");
            });
        }
    },
    created() {
        this.getChallengeSets();
    }
    
}
</script>

<style scoped>
.category {
    width: 90%;
    height: 65px;
    
    position: relative;
    left: 5%;
    margin-top: 30px;

    border: 2px solid white;
    border-radius: 6px;
}

.categoryName  {
    font-family: "Akzidenz Bold Extended";
    font-size: 15px;
    letter-spacing: 2px;
    color: white;

    text-align: left;
    position: absolute;
    left: 15%;
    top: 25px;
}

.categoryPoints {
    font-family: "Akzidenz Bold";
    font-size: 13px;
    letter-spacing: 2px;
    color: white;
    opacity: 0.5;

    text-align: left;
    position: absolute;
    right: 25%;
    top: 26px;
}

.favourite {
    height: 15px;
    fill: white;

    position: absolute;
    left: 5%;
    top: 25px;
}

.dropdown {
    background-color: transparent;
    border: none;
}

.dropdownIcon {
    height: 10px;

    position: absolute;
    right: 10%;
    top: 28px;
}

li {
    list-style-type: none;
}


</style>