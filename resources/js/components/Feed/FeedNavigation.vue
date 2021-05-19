<template>
<div class="FeedNavigationBG">
<div class="FeedNavigation">
    <div :class="[isActiveFeatured ? 'active' : 'inactive']" @click="isActiveFeatured = !isActiveFeatured; isActiveFollowing = !isActiveFollowing">Featured</div>
    <div class="line">|</div>
    <div :class="[isActiveFollowing ? 'active' : 'inactive']" @click="isActiveFeatured = !isActiveFeatured; isActiveFollowing = !isActiveFollowing">Following</div>
    
    
</div>
</div>
    
</template>

<script>
export default {
    name: 'FeedNavigation',
    data:function() {
        return {
            isActiveFeatured: true,
            isActiveFollowing: false,
        }
    },

}
</script>

<style scoped>

.FeedNavigationBG {
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

.FeedNavigation {
    display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
    position: sticky;
    top:0px;

    margin-top: 30px;

    font-family: "Akzidenz Regular";
    font-size: 14px;
    color: white;
    z-index: 3;
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