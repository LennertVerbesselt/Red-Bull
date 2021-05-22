<template>
<div class="ChallengeNavigationBG">
    
<div class="ChallengeNavigation">
    
    <div :class="[isActiveChallenges ? 'active' : 'inactive']" @click="isActiveChallenges = !isActiveChallenges; isActiveLeaderboards = !isActiveLeaderboards">
        <img v-if="isActiveFavourites" @click="isActiveFavourites = !isActiveFavourites" class="favourite" src="../../../assets/star-solid.svg" alt="">
        <img v-if="!isActiveFavourites" @click="isActiveFavourites = !isActiveFavourites" class="favourite" src="../../../assets/star-regular.svg" alt="">
        Challenges
    </div>
    <div class="line">|</div>
    <div :class="[isActiveLeaderboards ? 'active' : 'inactive']" @click="isActiveLeaderboards = !isActiveLeaderboards; isActiveChallenges = !isActiveChallenges">Leaderboards</div>
    
    
</div>

</div>

    
</template>

<script>
export default {
    name: 'ChallengeNavigation',
    data:function() {
        return {
            isActiveChallenges: true,
            isActiveLeaderboards: false,
            isActiveFavourites: false,
        }
    },

}
</script>

<style scoped>

.ChallengeNavigationBG {
    width:100%;
    height: 100px;
    background: #252525;
	background: linear-gradient(180deg, rgba(18,20,38,1) 9%, rgba(18,20,38,0.9) 50%, rgba(18,20,38,0) 100%);
	top: 0px;
	left: 0;
	right: 0;
	bottom: 0;
    position: sticky;

    margin-bottom: -30px;

    z-index: 3;
}

.ChallengeNavigation {
    display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
    position: sticky;
    top:0px;

    margin-top: 30px;

    font-family: "Akzidenz Regular";
    font-size: 14px;
    letter-spacing: 2px;
    color: white;
    z-index: 3;
}

.favourite {
    height: 13px;
    fill: white;

    position: relative;
    
    z-index: 4;
}

.line {
    display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
    
    margin-left: 5px;
    margin-right: 5px;
    z-index: 3;
}

.active {
    display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
    

    font-family: "Akzidenz Bold";
    font-size: 14px;
    color: white;
    z-index: 3;
}

.inactive {
    display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;

    font-family: "Akzidenz Regular";
    font-size: 14px;
    color: white;
    opacity: 0.25;
    z-index: 3;
}

</style>