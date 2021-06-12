<template>
<router-link :to="{ name: 'ChallengeSetOverview', params: {ChallengeSetID: ChallengeSetID, ChallengeSetName: ChallengeSetName, ChallengeSetDifficulty: ChallengeSetDifficulty, Challenges: Challenges, CategoryName: CategoryName, CategoryPoints:CategoryPoints, CategoryIcon: CategoryIcon} }">
<div class="ChallengeSet" v-if="ChallengeSet.percentage != 100" @click="ChallengeSetShow = !ChallengeSetShow">

    <div class="challengeseticon ">
        <img :src="ChallengeSetIcon" />
    </div>

    
    
        <div class="ChallengeSetName">
            {{ChallengeSetName}}
        </div>
    
    <div class="progress-gauge">
                <ve-progress  v-if="ChallengeSet.percentage != 100"
                        :progress="ChallengeSet.percentage"
                        :determinate="determinate"
                        v-bind="options"
                        :loading="loading"
                        :no-data="noData"
                    >
                    <span class="progress-text">{{ChallengeSet.completed}}/{{ChallengeSet.total}}</span>
                    </ve-progress>
    </div>
</div>

<div v-if="ChallengeSet.percentage == 100" class="challengeset completed" :click="changeShow">

    <div class="icon-completed">
        <img :src="ChallengeSetIcon" />
    </div>

    
    
        <div class="ChallengeSetNameCompleted">
            {{ChallengeSetName}}
        </div>

    <div class="progress-gauge">
                    <svg v-if="ChallengeSet.percentage == 100" class="progress-done" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25">
                        <g id="Confirm" transform="translate(-383 -557)">
                            <rect id="Rectangle_156" data-name="Rectangle 156" width="25" height="25" rx="12" transform="translate(383 557)" fill="#58EB71"/>
                            <path id="Icon_feather-check" data-name="Icon feather-check" d="M14.817,9,8.755,15.062,6,12.306" transform="translate(385.092 557.469)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                    </svg>

                </div>
    
</div>
</router-link>
    
</template>

<script>

import Challenge from './ChallengeItem.vue'
import ChallengeSetOverview from './ChallengeSetOverview.vue'
import VueFinalModal from 'vue-final-modal'
import { VeProgress } from "vue-ellipse-progress";

export default {
    name: 'ChallengeSet',
    components: {
        Challenge,
        VeProgress,
        ChallengeSetOverview,
        VueFinalModal,
    },
    props: {
        CategoryName: String,
        CategoryPoints: Number,
        CategoryID: Number,
        CategoryIcon: String,

        ChallengeSetID: Number,
        ChallengeSetName: String,
        ChallengeSetEventID: Number,
        ChallengeSetLength: Number,
        ChallengeSetDifficulty: Number,
        Challenges: Object,
        ChallengeSetIcon: String,
        ChallengeSet: Object,

    },
    data:function() {
        return {
            ChallengeSetShow: false,
            options: {
                color: "#EB5876",
                colorFill: "#121426",
                        
                emptyThickness:"0%",
                size: 30,
                thickness: 3,
                "empty-thickness": 0.5,
                animation: "rs 700 1000",
                half: false,
                angle: 90,
                line: "round",
                
                },
            showModal: false,
            
        }
    },
    methods: {
        changeShow() {
            this.ChallengeSetShow = !this.ChallengeSetShow;
            console.log(this.ChallengeSetShow);
        }
    },
    created() {
        
    },
    mounted() {
        
    }
    
}
</script>

<style scoped>
.ChallengeSet {
    width: 86%;
    height: 100px;
    
    position: relative;
    left: 7%;
    margin-top: 15px;
    margin-bottom: 5px;

    display: flex;
    justify-content: left;
    align-items: center;

    border-bottom: 1px solid white;
    border-top: 1px solid white;
}

.ChallengeSetName  {
    font-family: "Akzidenz Bold";
    font-size: 18px;
    color: white;
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

.challengeseticon {
    position: relative;
    width: 25%;
    display:flex;
    justify-content: left;
}

.challengeseticon img {
    
    max-width: 75px;
    
    max-height: 75px;
}

.progress-text {
    font-family: "Akzidenz Medium";
    font-size: 10px;
    color:#ffffff;
    display: flex;
    justify-content: center;
    align-items: center;

}

.completed {
    position: relative;
    width: 86%;
    left:7%;
    height: 45px;

    display: flex;
    justify-content: left;
    align-items: center;
}
.icon-completed {
    width: 40px;
}

.icon-completed img {
    max-width: 25px;
    max-height: 25px;
}

.progress-gauge {
    margin-left: auto;
}

.ChallengeSetNameCompleted  {
    font-family: "Akzidenz Bold";
    font-size: 14px;
    letter-spacing: 2px;
    color: white;
}



</style>