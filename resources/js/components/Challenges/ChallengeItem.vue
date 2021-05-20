<template>

<div class="Challenge">
    <img :src="ChallengeBadge" class="badge" />
    <div class="ChallengeName">
        {{ChallengeName}}
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
        ChallengeCansNeeded: Number,
        ChallengePoints: Number,
        
        
    },
    data:function() {
        return {
            ChallengeExpand: false,
            ChallengeProgression: [],
            ChallengeBadge: "",
        }
    },
    methods: {
        getChallengeProgression(){
            /*axios.get('api/getchallengesets').then(response => {
                this.ChallengeSets=response.data.challengesets;
                console.log("Challenge Sets Obtained");
            }).catch(error => {
                console.log("Error, Challenge Sets not obtained");
            });*/
        },

        getChallengeBadge() {
            axios.post('api/getchallengebadge', {challengeid: this.ChallengeID}).then(response => {
                this.ChallengeBadge=response.data.badge[0].url;
                console.log(response.data.badge[0].url);
                console.log("Challenge Badge Obtained");
            }).catch(error => {
                console.log("Error, Challenge Badge not obtained");
            });
        }
    },
    created() {
        this.getChallengeBadge();
    }
    
}
</script>

<style scoped>
.Challenge {
    width: 80%;
    height: 55px;
    
    position: relative;
    left: 10%;
    margin-top: 15px;

    border: 1px solid white;
    border-radius: 6px;
}

.ChallengeName  {
    font-family: "Akzidenz Regular";
    font-size: 12px;
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

.badge {
    border-radius: 50%;
    width: 40px;
    height: 40px;
 }


</style>