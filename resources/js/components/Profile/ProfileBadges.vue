<template>

<div class="categories" :key="category" v-for="category in ChallengesInfo">
    <div class="category">
        <div class="category-header">
            <span class="category-name">{{category.category_name}}</span>
            <span class="category-line"></span>
        </div>
        
        <div class="challengesets" >
            <div class="challengeset" :key="challengeset" v-for="challengeset in category.challengesets">

                <div class="challengeset-icon-container">
                <img class="challengeset-icon" :src="challengeset.icon" />
                <div class="progress-gauge">
                <ve-progress  v-if="challengeset.percentage != 100"
                        :progress="challengeset.percentage"
                        :determinate="determinate"
                        v-bind="options"
                        :loading="loading"
                        :no-data="noData"
                    >
                    <span class="progress-text">{{challengeset.completed}}/{{challengeset.total}}</span>
                    </ve-progress>
                    <svg v-if="challengeset.percentage == 100" class="progress-done" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                        <g id="Confirm" transform="translate(-383 -557)">
                            <rect id="Rectangle_156" data-name="Rectangle 156" width="25" height="25" rx="12" transform="translate(383 557)" fill="#58EB71"/>
                            <path id="Icon_feather-check" data-name="Icon feather-check" d="M14.817,9,8.755,15.062,6,12.306" transform="translate(385.092 557.469)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                    </svg>

                </div>
               
                <div class="progress-bar">
                    </div>
                    
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
      colorFill: "#121426",
            
      emptyThickness:"0%",
      size: 40,
      thickness: 3,
      "empty-thickness": 0.5,
      animation: "rs 700 1000",
      half: false,
      angle: 90,
      line: "round",
      
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
    margin-top: 15px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}

.category-header {
    width: 100%;
    display: flex;
    justify-content: left;
    align-items:center;
    height: 30px;
}

.category-name {
    align-items:center;
    font-family: "Akzidenz Bold Extended";
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
    height: 170px;
    position: relative;

    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
}

.challengeset {
    margin-left: 15px;
    margin-right: 15px;
    width: 130px;

    font-family: "Akzidenz Medium";
    font-size: 14px;
    color:white;
}

.challengeset-icon-container {
    width: 100%;
    max-width: 115px;
    height: 170px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.challengeset-icon {
    max-height: 140px;
    max-width: 140px;
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
    width:130px;
    bottom:0;
    
}

.progress-text {
    font-family: "Akzidenz Bold";
    font-size: 14px;
    color:#ffffff;
}

.ep-circle--progress__fill {
    box-shadow: 0px 0px 5px #EB5876;
}

.progress-done {
    width: 30px;
    height: 30px;
}



</style>