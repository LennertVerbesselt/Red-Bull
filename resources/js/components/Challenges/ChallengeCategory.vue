<template>

<div class="category">
    <img @click="setFavourite" v-if="!categoryfavourite" class="favourite" src="../../../assets/star-regular.svg" alt="">
    <img @click="setFavourite" v-if="categoryfavourite" class="favourite" src="../../../assets/star-solid.svg" alt="">
    <div class="categoryName">
        {{CategoryName}}
    </div>
    <div class="categorypoints">
        <div class="points">
            {{Category.points}}
        </div>
        <div class="icon">
            <img :src="Category.icon" />
        </div>
    </div>
    
    <button class="dropdown">
        <img class="dropdownIcon" v-if="ShowCategory" @click="ShowCategory = !ShowCategory" src="../../../assets/downvote.png" alt="">

        <img class="dropdownIcon" v-if="!ShowCategory" @click="ShowCategory = !ShowCategory" src="../../../assets/upvote.png" alt="">
    </button>
</div>
<div v-if="ShowCategory">
    <li class="ChallengeSet" :key="challengeset" v-for="challengeset in ChallengeSets"><div v-if="challengeset.percentage != 100">
            <ChallengeSet :ChallengeSetName="challengeset.name" :ChallengeSetID="challengeset.id" :Challenges="challengeset.challenges" :ChallengeSetIcon="challengeset.icon" :ChallengeSet="challengeset"></ChallengeSet></div>
    </li>
    <li class="ChallengeSet" :key="challengeset" v-for="challengeset in ChallengeSets"><div v-if="challengeset.percentage == 100">
            <ChallengeSet :ChallengeSetName="challengeset.name" :ChallengeSetID="challengeset.id" :Challenges="challengeset.challenges" :ChallengeSetIcon="challengeset.icon" :ChallengeSet="challengeset"></ChallengeSet></div>
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
        CategoryFavourite: Boolean,
        Category: Object,
        
    },
    data:function() {
        return {
            ShowCategory: true,
            ChallengeSets: [],
            categoryfavourite: false,
            
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
        },

        setFavourite(){
            axios.post('api/setfavourite', {categoryname: this.CategoryName}).then(response => {
                this.categoryfavourite = !this.categoryfavourite;
            }).catch(error => {
                console.log("Error, Category not set as favourite");
            });
        }
    },
    created() {
        this.categoryfavourite = this.CategoryFavourite;
        this.ChallengeSets = this.Category['challengesets'];
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

    display: flex;
    justify-content:left;
    align-items: center;
}

.categoryName  {
    font-family: "Akzidenz Bold Extended";
    font-size: 15px;
    letter-spacing: 2px;
    color: white;

    text-align: left;
    
    margin-right: 15px;
}



.favourite {
    height: 15px;
    fill: white;
    margin-left: 25px;
    margin-right: 15px;
    
}

.dropdown {
    background-color: transparent;
    border: none;
}

.dropdownIcon {
    height: 10px;
    margin-right: 25px;
}

li {
    list-style-type: none;
}

.categorypoints {
    position: relative;
    height: 100%;
    width: 100px;
    margin-left: auto;

    display: flex;
    justify-content: center;
    align-items: center;
}

.points {
    font-family: "Akzidenz Medium";
    font-size: 20px;
    color: white;
}

.icon {
    position: absolute;

    display: flex;
    justify-content: center;
    align-items: center;
}

.icon img {
    width: 60px;
    top: 0px;
    max-height: 40px;
    max-width: 40px;
    opacity: .2;
}


</style>