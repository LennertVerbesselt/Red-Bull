<template>

    <div class="challenge-select-wrapper">
            
            <div class="categories" v-if="showCategories"> 
                <div class="title">Select Category:</div>
                <div class="categories-body">
                <div class="category" :key="category" v-for="category in ChallengesPage" @click="setCategory(category.category_id, category.challengesets)">
                    
                    <div class="category-icon" >
                        <img :src="category.icon" />
                    </div>
                    <label class="rad-label" >
                        <div class="rad-text" >{{category.category_name}}</div>
                        <input type="radio" class="rad-input" name="rad" >
                        <div class="rad-design" ></div>
                        
                    </label>
                    </div>
                </div>
                <div class="buttons">
                    <div v-if="FinalCategory" @click="toChallengeSets" class="next">
                        <div class="next-text">Next</div>
                    </div>
                </div>
            </div>
        
        
            <div class="challenge-sets" v-if="showChallengeSets">
                <div class="title">Select Challenge Set:</div>

                <div class="categories-body">
                <div class="category" :key="set" v-for="set in ChallengeSets" @click="setChallengeSet(set.id, set.challenges)">
                    
                    <div class="category-icon">
                        <img :src="set.icon" />
                    </div>
                    <label class="rad-label">
                        <div class="rad-text">{{set.name}}</div>
                        <input type="radio" class="rad-input" name="rad">
                        <div class="rad-design"></div>
                        
                    </label>
                    </div>
                </div>


                <div class="buttons">
                    <div @click="toCategories" class="next">
                        <div class="next-text">Back</div>
                    </div>
                    <div v-if="FinalChallengeSet != 0" @click="toChallenges" class="next">
                        <div class="next-text">Next</div>
                    </div>
                </div>
            </div>
        
        
            <div class="challenges" v-if="showChallenges">
                <div class="title">Select Challenge:</div>

                <div class="categories-body">
                <div class="" :key="challenge" v-for="challenge in Challenges" @click="setChallenge(challenge.id)" >
                    <div class="category" v-if="challenge.progression.locked">
                    
                    <div class="category-icon" >
                        <img :src="challenge.badge" />
                    </div>
                    <label class="rad-label">
                        <div class="rad-text">{{challenge.name}}</div>
                        <input type="radio" class="rad-input" name="rad">
                        <div class="rad-design"></div>
                        
                    </label>
                    </div>
                    </div>
                </div>

                <div class="buttons">
                    <div @click="toChallengeSets" class="next">
                        <div class="next-text">Back</div>
                    </div>
                    <div v-if="FinalChallenge != 0" class="next" @click="onDecode">
                        <div class="next-text">Submit</div>
                    </div>
                </div>
            </div>
        
    </div>
    
</template>

<script>


export default {
    name:'ChallengeSelect',
    components: {
    },
    props: {
        QRCode: String,
    },
    data:function() {
        return  {
            showCategories: true,
            showChallengeSets: false,
            showChallenges:false,

            ChallengesPage: [],
            ChallengeSets: [],
            
            ChallengeSet: [],
            Challenges: [],
            Category: [],
            code: "",

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

         onDecode () {
             console.log(this.QRCode);
             console.log(this.FinalChallenge);

            // Check backend
            axios.post('api/checkqrcode', {qrcode: this.QRCode, challengeid: this.FinalChallenge}).then(response => {
                        if(response.data.status) {
                        this.handleValidQRCode(response.data.challengedefined);
                        
                        } else {
                        }
                    }).catch(error => {
                        console.log("Error");
                    });

            
            },

        handleValidQRCode(c) {
                if(c){
                this.$router.push('/challenges');
                }
                else {
                this.$router.push({ name: 'Challenges', params: { QRCode: this.result } })
                }
            },

        toCategories(){
            
            this.showCategories = true;
            this.showChallengeSets = false;
            this.showChallenges = false;
        },


        toChallengeSets(){
            this.showCategories = false;
            this.showChallengeSets = true;
            this.showChallenges = false;
        },

        toChallenges(){
            this.showCategories = false;
            this.showChallengeSets = false;
            this.showChallenges = true;
        },

        setCategory(category, sets){
            this.FinalCategory = category;
            this.ChallengeSets = sets;
            
        },
        setChallengeSet(set, challenges){
            this.FinalChallengeSet = set;
            this.Challenges = challenges;
            
            
        },
        setChallenge(challenge){
            this.FinalChallenge = challenge;
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
  transition: all 1s ease;
}

.slide-enter-from {
  opacity: 0;
}

.slide-leave-to {
  opacity: 0;
}

.buttons {
    display:flex;
    justify-content: space-evenly;
    align-items: center;
    margin-top: 10px;
}

.next {
    width: 160px;
    height: 30px;

    margin-left: 10px;
    margin-right: 10px;

    background-color: #EB5876;

    
    box-shadow: 0px 0px 3px #EB5876;

    display: flex;
    justify-content: center;
    align-items: center;

    -ms-transform: skewX(-30deg);
    -webkit-transform: skewX(-30deg);
    transform: skewX(-30deg);
}

.next-text {
    font-family: "Akzidenz Medium";
    font-size: 14px;
    color: white;
    text-decoration: none;
    -ms-transform: skewX(30deg);
    -webkit-transform: skewX(30deg);
    transform: skewX(30deg); 
    
}


.title {
    font-family: "Akzidenz Bold Extended";
    font-size: 22px;
    color: white;
    margin-top: 35px;
    margin-bottom: 20px;
}



.categories-body {
    position: relative;
    width: 90%;
    left:5%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
}
.category {
    height: 100px;
    width: 40%;
    display:flex;
    justify-content: center;
    align-items: center;
    margin: 10px 0px;
}

.category-name {
    font-family: "Akzidenz Bold";
    font-size: 22px;
    color: white;
    text-align: center;
}


.category-icon {
    position:absolute;
    width: 140px;
    height: 100px;

    display: flex;
    flex-flow: column;
    justify-content: flex-start;
    align-items: center;
    
}

.category-icon img {
    max-width: 60px;
    max-height: 60px;
    position: relative;
    top:0;

    opacity: 0.2;
}

.rad-label {
  display: flex;
  flex-flow: column;
  align-items: center;
  justify-content: space-around;

  border-radius: 10px;
  
  margin: 10px 0;

  cursor: pointer;
  transition: .3s;

  height: 100%;
  width: 100%;
}

.rad-label:hover,
.rad-label:focus-within {
  background: hsla(0, 0%, 80%, .14);
}

.rad-input {
  position: absolute;
  left: 0;
  top: 0;
  width: 1px;
  height: 1px;
  opacity: 0;
  z-index: -1;
}

.rad-design {
  width: 15px;
  height: 15px;
  border-radius: 100px;

  background-color: #EB5876;
  position: relative;
  bottom: 0;
}

.rad-design::before {
  content: '';

  display: inline-block;
  width: inherit;
  height: inherit;
  border-radius: inherit;

  background: hsl(0, 0%, 90%);
  transform: scale(1.1);
  transition: .3s;
}

.rad-input:checked+.rad-design::before {
  transform: scale(0);
}

.rad-text {
  
  font-weight: 900;

  transition: .3s;
  font-family: "Akzidenz Medium";
    font-size: 20px;
    color: white;
}



</style>