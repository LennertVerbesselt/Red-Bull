<template>
<transition name="slide" appear>
    <div class="wrapper">
        <div class="back">
            <router-link to="/challenges">
                <div class="back-text">
                    Back
                </div>
            </router-link>
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
            <div class="challenge-item" :key="challenge" v-for="challenge in Challenges">
                <div class="badge">
                    <img :src="challenge.badge" />
                </div>
                <div class="title">
                    {{challenge.name}}
                </div>
            </div>

        </div>
    </div>
</transition>

</template>

<script>



export default {
	name: 'ChallengeSetOverview', 
    components: {
        
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
    position: absolute;
    top:0;
    left:0;
    width: 100vw;
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
    color: #123456;
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

}

.challenge-item {
    min-width: 33.333%;
    height: 80px;

    display: flex;
    flex-flow: column;
    justify-content: center;
    align-items: center;
}

.challenge-item img {
    max-width: 50px;
    max-height: 50px;

}

</style>