<template>
<transition name="slide" appear>
    <div class="wrapper">
        <div class="back">
            
                <div class="back-text">
                    <a @click="$router.go(-1)">Back</a>
                </div>

        </div>
        <div class="set-header">
            <div class="header-background">
                <img :src="Event.header" class="header-img"/>
                <img src="./../../../assets/gradient.png" alt="" class="gradient">
            </div>
            <div class="icon">
                <img :src="ChallengeSet.icon" />
            </div>
            <div class="set-name">
                {{ChallengeSet.name}}
            </div>
            <div class="set-description">
                {{Event.description}}
            </div>
        </div>
        <div class="points">
            <div class="points-text">
                {{ChallengeSet.obtainedpoints}}/{{ChallengeSet.totalpoints}}
            </div>
            <div class="points-icon">
                <img :src="Category.icon" />
            </div>
        </div>
        <div class="set-body" >
            <div class="challenge-item" :key="challenge" v-for="challenge in Challenges" @click="openPopup(challenge)">
                <challenge-item :ChallengeName="challenge.name" :ChallengePoints="challenge.points" :ChallengeBadge="challenge.badge" :ChallengeCansNeeded="challenge.cans_needed_to_unlock" :ChallengeDescription="challenge.description" :ChallengeDifficulty="challenge.difficulty" :ChallengeID="challenge.id" :ChallengeProgression="challenge.progression"></challenge-item>  

                
            </div>

        </div>
        <BottomMenu></BottomMenu>
    </div>
    
 
</transition>

<div class="ChallengePopupOverlay" v-if="ShowPopup" @click="closePopup"></div>

<div class="ChallengePopup" v-if="ShowPopup">
    <div class="popupoverlay">
        <div class="PopupContainer">
            <div class="closepopup" @click="closePopup">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                    <g id="Close" transform="translate(-383 -557)">
                        <rect id="Rectangle_156" data-name="Rectangle 156" width="25" height="25" rx="12" transform="translate(383 557)" fill="#eb5876"/>
                        <path id="Icon_ionic-ios-close" data-name="Icon ionic-ios-close" d="M15.888,15.009l2.658-2.658a.623.623,0,0,0-.881-.881l-2.658,2.658L12.349,11.47a.623.623,0,1,0-.881.881l2.658,2.658-2.658,2.658a.623.623,0,1,0,.881.881l2.658-2.658,2.658,2.658a.623.623,0,0,0,.881-.881Z" transform="translate(380.494 554.491)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                    </g>
                </svg>

            </div>
            <div class="popup-badge">

                <div class="badge-locked" v-if="ChallengePopup.progression.locked">
                    <img :src="ChallengePopup.badge" class="greybadge"/>
                </div>
                <div class="badge-unlocked" v-if="ChallengePopup.progression.unlocked">
                    <img :src="ChallengePopup.badge" class="greybadge" />
                </div>
                <div class="badge-pending" v-if="ChallengePopup.progression.pending">
                    <img :src="ChallengePopup.badge" class="greybadge" />
                </div>
                <div class="badge-complete" v-if="ChallengePopup.progression.complete">
                    <img :src="ChallengePopup.badge" />
                </div>

                
            </div>
            <div class="popup-title"> {{ChallengePopup.name}} </div>
            <div class="popup-description">
                <div class="description-locked" v-if="ChallengePopup.progression.locked">
                    Scan {{ChallengePopup.cans_needed_to_unlock - ChallengePopup.progression.cans_scanned}} QR Codes
                </div>
                <div class="description-unlocked" v-if="ChallengePopup.progression.unlocked">
                    {{ChallengePopup.description}}
                </div>
                <div class="description-pending" v-if="ChallengePopup.progression.pending">
                    Verifying your sumbission!
                </div>
                <div class="description-completed" v-if="ChallengePopup.progression.complete">
                    Completed: {{ChallengePopup.description}}
                </div>
            </div>
            <div class="popup-points">
                <div class="popup-points-icon">
                    <img :src="Category.icon" />
                    </div>
                <div class="popup-points-number"> +{{ChallengePopup.points}}</div>
            </div>
            <div class="popup-cans">
                <div class="popup-cans-icon">
                    <img src="./../../../assets/qrIcon.svg" />
                </div>
                <div class="popup-cans-number-unstarted" v-if="0 == ChallengePopup.progression.cans_scanned ">{{ChallengePopup.progression.cans_scanned}}/{{ChallengePopup.cans_needed_to_unlock}} </div>
                <div class="popup-cans-number-scanning" v-if="0 != ChallengePopup.progression.cans_scanned && ChallengePopup.cans_needed_to_unlock > ChallengePopup.progression.cans_scanned">{{ChallengePopup.progression.cans_scanned}}/{{ChallengePopup.cans_needed_to_unlock}} </div>
                <div class="popup-cans-number-unlocked" v-if="ChallengePopup.progression.cans_scanned == ChallengePopup.cans_needed_to_unlock">{{ChallengePopup.progression.cans_scanned}}/{{ChallengePopup.cans_needed_to_unlock}} </div>
            </div>
            
            <div class="popup-cta">
                <div class="popup-locked" v-if="ChallengePopup.progression.locked">
                    <router-link :to="{ name: 'ChallengeQRScanner', params: {id: ChallengePopup.id} }">
                        <img class="qricon"  src="./../../../assets/ChallengeQRScannerIcon.png" />
                        <div class="qr-text">Scan</div>
                    </router-link>
                </div>
                <div class="popup-unlocked" v-if="ChallengePopup.progression.unlocked">
                    <router-link :to="{ name: 'Upload', params: { id: ChallengePopup.id } }">
                        <img   src="./../../../assets/cloud-upload-alt-solid.svg" />

                        <div class="upload-text">Upload</div>
                        
                    </router-link>
                </div>
                <div class="popup-pending" v-if="ChallengePopup.progression.pending">
                    Stay Tuned!
                </div>
                <div class="popup-complete" v-if="ChallengePopup.progression.complete">
                    Completed!
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>

import ChallengeItem from './ChallengeItem.vue'
import BottomMenu from './../BottomMenu.vue'

export default {
	name: 'ChallengeSetOverview', 
    components: {
        ChallengeItem,
        BottomMenu,
    },
    props: {
        ChallengeSetID: Number,
    },
    data:function() {
      return {
          id: 13,
          ChallengeSet: [],
          Challenges: [],
          Event: [],
          Category: [],
          ShowPopup: false,
          ChallengePopup: [],
      }
    },
	methods: {
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

        openPopup(challenge) {
            this.ChallengePopup = challenge;
            this.ShowPopup = !this.ShowPopup;
        },

        closePopup() {
            this.ShowPopup = !this.ShowPopup;
        }

        
	},
	created() {
        if(this.ChallengeSetID){
            this.id = this.ChallengeSetID;
        }
        
	},
	mounted() {
		this.getChallenges();
	}
}
</script>

<style scoped>
.wrapper{
    position: relative;
    top:0;
    left:0;
    width: 100%;
    height: 100%;

    color: white;
    z-index: 5;
}

.slide-enter-active,
.slide-leave-active {
  transition: all 0.75s ease-out;
}

.slide-enter-from {
  opacity: 0;
}


.slide-leave-to {
  opacity: 0;
}

.back-text {
    position: fixed;
    top: 15px;
    left: 25px;
    z-index: 3; 

    font-family: "Akzidenz Bold";
    font-size: 16px;
    color: #121426;
}

.set-header {
    position: relative;
    width: 100%;
    height: 330px;

    display: flex;
    justify-content: center;
    align-items: center;
    flex-flow: column;
}

.header-background {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0px;
    left: 0;
}


.gradient {
    width: 100%;
    height: 150px;
    position: absolute;
    left: 0;
    top: 51px;
    
}


.header-img {
    width: 100%;
    max-height: 200px;
    position: absolute;
    left:0;
    top: 0;
    object-fit: cover;
    object-position: 0% 0%;
}

.icon {
    display:flex;
    justify-content: center;

}

.icon img{
    max-width: 100px;
    max-height: 100px;
    z-index: 3;
    margin-top: 80px;
}

.set-name {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
    color: white;
    z-index: 3;

    margin-top: 15px;
}

.set-description {
    font-family: "Akzidenz Medium";
    font-size: 14px;
    color:white;
    opacity: .3;

    width: 60%;
    left: 20%;

    margin-top: 15px;
}

.points {
    width: 100%;
    position: relative;

    display: inline-flex;
    justify-content: center;
    align-items: center;
    flex-flow: row;
    flex-wrap: nowrap;
}

.points-text {
    font-family: "Akzidenz Bold Extended";
    font-size: 30px;
    color:white;
}

.points-icon img{
    max-width: 30px;
    max-height: 70px;

    margin-left: 10px;
}

.set-body{
    position: relative;
    margin-top: 40px;
    width: 90%;
    left: 5%;
    display:flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;

}

.challenge-item {
    min-width: 33.333%;
    height: 120px;

    display: flex;
    flex-flow: column;
    justify-content: center;
    align-items: center;
}

.challenge-item img {
    max-width: 50px;
    max-height: 50px;

}

.title {
    font-family: "Akzidenz Regular";
    font-size: 12px;
    color: white;
}

.ChallengePopupOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;

    background-color: #121426;
    opacity: 0.8;

    z-index: 5;

}

.ChallengePopup {
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;

    display: flex;
    justify-content: center;
    align-items: center;

}

.PopupContainer {
    position: relative;

    width: 260px;
    height: 450px;
    background-color: #121426;
    opacity: 1;

    border-radius: 10px;
    /*border: 2px solid #EB5876;*/

    box-shadow: 0px 0px 20px #EB5876;

    z-index: 6;

    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-flow: column;
}

.popup-badge img{
    max-width: 70px;
    max-height: 70px;

    margin-top: 15px;

}

.popup-title {
    font-family: "Akzidenz Bold";
    font-size: 12px;
    color: white;

}

.popup-description {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
    color: white;
    max-width: 200px;

    margin-bottom: 25px;
}

.popup-points, .popup-cans {
    width: 50%;

    left: 25%;

    display:flex;
    justify-content: space-between;
    align-items: center;
}

.popup-cans {
    margin-bottom: 25px;
}

.popup-points-icon img, .popup-cans img {
    width: 30px;
    height: 30px;
}

.popup-points-number, .popup-cans-number-unstarted {
    font-family: "Akzidenz Bold Extended";
    font-size: 24px;
    color: white;
}

.popup-cans-number-scanning {
    font-family: "Akzidenz Bold Extended";
    font-size: 24px;
    color: #FFF07C;
}

.popup-cans-number-unlocked {
    font-family: "Akzidenz Bold Extended";
    font-size: 24px;
    color: #58EB71;
}

.greybadge {
    filter: grayscale(100%);
}

.popup-complete {
    font-family: "Akzidenz Bold Extended";
    font-size: 24px;
    color: #58EB71;

    margin-bottom: 15px;
}

.popup-pending {
    font-family: "Akzidenz Bold Extended";
    font-size: 24px;
    color:#FFF07C;

    margin-bottom: 15px;
}

.popup-unlocked a {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
   
    margin-bottom: 15px;

    
}

.upload-text {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
    color:white;
}

.popup-unlocked a {
    text-decoration: none;
}

.popup-unlocked img {
    width: 30px;
    height: 30px;
    margin: 0px 10px;
}



.popup-locked a {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
   
    margin-bottom: 15px;
}

.qr-text {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
    color:white;
}

.popup-locked a {
    text-decoration: none;
}

.popup-locked img {
    width: 25px;
    height: 25px;
    margin: 0px 10px;
}

.popup-cta {
    margin-bottom: 15px;
}

.closepopup {
    position: absolute;
    top: 15px;
    right:15px;
}



</style>