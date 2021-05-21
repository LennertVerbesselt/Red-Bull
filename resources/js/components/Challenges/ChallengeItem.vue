<template>

<div class="Challenge">
    
    <div v-if="ChallengeLocked" class="locked">
        <img src="./../../../assets/lock-solid.svg" class="lock" />
        <div v-if="ChallengeLocked" class="ChallengeName">
            Challenge Locked: {{ChallengeName}}
        </div>
       
    </div>

    <div v-if="ChallengeUnlocked" class="unlocked">
        <img :src="ChallengeBadge" class="greybadge" />
        <div class="ChallengeName">
            {{ChallengeName}}
        </div>
        <router-link :to="{ name: 'Upload', params: { id: challenge_id } }"><img class="upload"  src="./../../../assets/cloud-upload-alt-solid.svg" /></router-link>
    </div>

    <div v-if="ChallengePending" class="pending">

    </div>

    <div v-if="ChallengeComplete" class="complete">
        <img  :src="ChallengeBadge" class="badge" />
    </div>
    
    
    
    <div class="qr" v-if="ChallengeLocked">
        <img class="qricon"  src="./../../../assets/ChallengeQRScannerIcon.png" />
        <div class="qrremaining">0/{{ChallengeCansNeeded}}</div>
    </div>
</div>

    
</template>

<script>



export default {
    name: 'ChallengeItem',
    components: {
    },
    props: {
        ChallengeName: String,
        ChallengePoints: Number,
        ChallengeID: Number,
        ChallengeDifficulty: Number,
        ChallengeDescription: String,
        ChallengeCansNeeded: String,
        ChallengePoints: Number,
        
        
    },
    data:function() {
        return {
            ChallengeExpand: false,
            ChallengeProgression: [],
            ChallengeBadge: "",
            ChallengeLocked: true,
            ChallengeUnlocked: false,
            ChallengePending: false,
            ChallengeComplete: false,
            challenge_id: 0,
        }
    },
    methods: {
        getChallengeProgression(){
            axios.post('api/getchallengeprogression', {challengeid: this.ChallengeID}).then(response => {
                this.ChallengeProgression = response.data.challengeprogression;
                this.updateChallengeState(response.data.challengeprogression[0]);
            }).catch(error => {
                console.log("Error, Challenge Sets not obtained");
            });
        },

        getChallengeBadge() {
            axios.post('api/getchallengebadge', {challengeid: this.ChallengeID}).then(response => {
                this.ChallengeBadge=response.data.badge[0].url;
                console.log("Challenge Badge Obtained");
            }).catch(error => {
                console.log("Error, Challenge Badge not obtained");
            });
        },

        updateChallengeState(progression){
            console.log(progression);
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
        this.getChallengeProgression();
        this.getChallengeBadge();
        this.challenge_id = this.ChallengeID;
        
        
    },
    mounted() {
        this.getChallengeBadge();
        this.getChallengeProgression();
    }
    
}
</script>

<style scoped>
.Challenge {
    width: 86%;
    height: 55px;
    
    position: relative;
    left: 7%;
    margin-top: 15px;

    border: 1px solid white;
    border-radius: 6px;
}

.ChallengeName  {
    font-family: "Akzidenz Regular";
    font-size: 12px;
    letter-spacing: 0px;
    color: white;

    text-align: left;
    position: absolute;
    left: 15%;
    top: 38%;
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

.lock {
    width: 25px;
    height: 25px;

    position: absolute;
    left: 4%;
    top: 25%;
}

.badge {
    border-radius: 50%;
    width: 25px;
    height: 25px;

    position: absolute;
    left: 4%;
    top: 25%;
 }

 .greybadge {
    border-radius: 50%;
    width: 25px;
    height: 25px;

    position: absolute;
    left: 4%;
    top: 25%;

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
}

.upload {
    position: absolute;
    right: 5%;
    top: 27%;
    width: 40px;
    height: 40px;
    width: 25px;
    height: 25px;
    
}

</style>