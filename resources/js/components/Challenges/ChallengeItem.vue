<template>

<div class="Challenge">
    
    <div v-if="ChallengeLocked" class="locked">
        <div class="lock">
        <img src="./../../../assets/lock-solid.svg" />
        </div>
        <img  :src="ChallengeBadge" class="greybadge" />
        
        <div v-if="ChallengeLocked" class="ChallengeName">
            {{ChallengeName}}
        </div>
       
    </div>

    <div v-if="ChallengeUnlocked" class="unlocked">
        <div class="upload">
            <img   src="./../../../assets/cloud-upload-alt-solid.svg" />
           </div>
        <img :src="ChallengeBadge" class="greybadge" />
        <div class="ChallengeName">
            {{ChallengeName}}
        </div>
       <!-- <router-link :to="{ name: 'Upload', params: { id: ChallengeID } }">-->
           
           <!--</router-link>-->
    </div>

    <div v-if="ChallengePending" class="pending">
        <img :src="ChallengeBadge" class="greybadge" />
        <div class="ChallengeName">
            {{ChallengeName}}
        </div>
    </div>

    <div v-if="ChallengeComplete" class="complete">
        <img  :src="ChallengeBadge" class="badge" />
        <div class="ChallengeName">
            {{ChallengeName}}
        </div>
    </div>
    
    
    
    <!--<div class="qr" v-if="ChallengeLocked">
        <router-link :to="{ name: 'ChallengeQRScanner', params: {id: ChallengeID} }">
            <img class="qricon"  src="./../../../assets/ChallengeQRScannerIcon.png" />
            <div class="qrremaining">{{ChallengeProgression.cans_scanned}}/{{ChallengeCansNeeded}}</div>
        </router-link>
    </div>-->
</div>

<div class="ChallengePopup" v-if="ShowPopup">
fsdqfsqd
</div>

    
</template>

<script>

import QRScanner from './ChallengeQRScanner.vue'

export default {
    name: 'ChallengeItem',
    components: {
        QRScanner,
    },
    props: {
        ChallengeName: String,
        ChallengePoints: Number,
        ChallengeID: Number,
        ChallengeDifficulty: Number,
        ChallengeDescription: String,
        ChallengeCansNeeded: String,
        ChallengePoints: Number,
        ChallengeProgression: Array,
        ChallengeBadge: String,
        
        
    },
    data:function() {
        return {
            ChallengeExpand: false,
            ChallengeLocked: true,
            ChallengeUnlocked: false,
            ChallengePending: false,
            ChallengeComplete: false,
            challenge_id: 0,
            ShowPopup: false,
        }
    },
    methods: {
        getChallengeProgression(){
            axios.post('api/getchallengeprogression', {challengeid: this.ChallengeID}).then(response => {
                this.ChallengeProgression = response.data.challengeprogression[0];
                this.updateChallengeState(response.data.challengeprogression[0]);
            }).catch(error => {
                console.log("Error, Challenge Sets not obtained");
            });
        },

        getChallengeBadge() {
            axios.post('api/getchallengebadge', {challengeid: this.ChallengeID}).then(response => {
                this.ChallengeBadge=response.data.badge[0].url;
            }).catch(error => {
                console.log("Error, Challenge Badge not obtained");
            });
        },

        updateChallengeState(progression){
            if(progression.locked == 1){
                this.ChallengeLocked = true;
                this.ChallengeUnlocked = false;
                this.ChallengePending = false;
                this.ChallengeComplete = false;
            } else if(progression.unlocked == 1) {
                this.ChallengeLocked = false;
                this.ChallengeUnlocked = true;
                this.ChallengePending = false;
                this.ChallengeComplete = false;
            } else if(progression.pending == 1) {
                this.ChallengeLocked = false;
                this.ChallengeUnlocked = false;
                this.ChallengePending = true;
                this.ChallengeComplete = false;
            } else if(progression.complete == 1) {
                this.ChallengeLocked = false;
                this.ChallengeUnlocked = false;
                this.ChallengePending = false;
                this.ChallengeComplete = true;
            }
        }
    },
    created() {
        this.updateChallengeState(this.ChallengeProgression);
        
        
    },
    mounted() {
        
    }
    
}
</script>

<style scoped>
.Challenge {

    display:flex;
    justify-content: space-around;
    flex-flow: column;
    align-items: center;

}

.ChallengeName  {
    font-family: "Akzidenz Regular";
    font-size: 12px;
    letter-spacing: 0px;
    color: white;
    opacity: .5;

    text-align: center;
    
}

.lock, .upload {
    height: 0px;
    position: relative;

    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.lock img {
    width: 13px;
    height: 13px;
    position: absolute;
    top: 0px;
}

.upload img{
    width: 15px;
    height: 15px;
    position: absolute;
    top: 0px;
    

    
}

.badge {
    width: 80px;
    height: 80px;

    
 }

 .greybadge {
    width: 80px;
    height: 80px;

    filter: grayscale(100%);
 }
.qr {
    position: relative;
    right: -37%;
    top: 27%;
    width: 40px;
    height: 40px;
    display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
}
/*
.qricon {
    position: absolute;
    right: 3px;
    width: 25px;
    height: 25px;
}

.qrremaining {
    position: absolute;
    right:23%;
    top:23%;

    font-family: "Akzidenz Light";
    font-size: 8px;
    color:white;
    text-align: center;
}*/


</style>