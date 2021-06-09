<template>

<div class="categories" :key="category" v-for="category in ChallengesInfo">
    <div class="category">
        <div class="category-header">
            <span class="category-name">{{category.category_name}}</span>
            <span class="category-line"></span>
        </div>
        
        <div class="challengesets" >
            <div class="challengeset" :key="challengeset" v-for="challengeset in category.challengesets">

                <img class="challengeset-icon" :src="challengeset.icon" />
               
                <div class="progress-bar">
                    <div class="progress-gauge">
                <ve-progress 
                        :progress="challengeset.percentage"
                        :determinate="determinate"
                        v-bind="options"
                        :loading="loading"
                        :no-data="noData"
                    >
                    <span class="progress-text">{{challengeset.completed}}/{{challengeset.total}}</span>
                    </ve-progress></div>
                    <span class="challengeset-name"> {{challengeset.name}}</span>
                </div>

                

            </div>
        </div>
    </div>
</div>

    
</template>

<script>

import { VeProgress } from "vue-ellipse-progress";

export default {
    name: 'UploadIcon',
    components: {
        VeProgress,
    },
    props: {
        Categories: Object,
        ChallengeSets: Object,
        ChallengeProgressions: Object,
        ChallengesInfo: Object,
    },
    data: () => ({
    options: {
      color: "#EB5876",
      emptyThickness:"0%",
      size: 45,
      thickness: 5,
      "empty-thickness": .5,
      animation: "rs 700 1000",
      half: true,
      angle: 0,
    },
  }),
}
</script>

<style scoped>

.categories{
    position: relative;
    width: 90%;
    left: 5%;


}

.category {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}

.category-header {
    width: 100%;
    display: flex;
    justify-content: left;
    align-items:center;
    height: 50px;
}

.category-name {
    align-items:center;
    font-family: "Akzidenz Medium";
    font-size: 18px;
    color: white;
}

/*.category-line {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 2px;
    background-color: white;
}*/

.challengesets {
    width: 100%;
    height: 165px;
    position: relative;

    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
}

.challengeset {
    margin-left: 5px;
    margin-right: 5px;
    width: 25%;

    font-family: "Akzidenz Medium";
    font-size: 14px;
    color:white;
}

.challengeset-icon {
    
    max-height: 65%;
    
}

.challengeset-name {
     font-family: "Akzidenz Regular";
    font-size: 14px;
    color:white;
    opacity: 0.4;
    white-space: nowrap;
  overflow: hidden;
}

.progress-bar {
    position: relative;
    height: 75px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    flex-direction: column;
}

.progress-gauge {
    position: absolute;
    width:100%;
    top: 0;
}

.progress-text {
    font-family: "Akzidenz Bold";
    font-size: 13px;
    color:white;
    bottom: 5px;
}



</style>