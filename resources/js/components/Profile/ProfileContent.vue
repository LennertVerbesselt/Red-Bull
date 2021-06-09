<template>

 <div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="posts" checked>
  <label for="tab1">Posts</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="badges" >
  <label for="tab2">Badges</label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" aria-controls="tickets">
  <label for="tab3">Tickets</label>

  
  <div class="tab-panels">
    <section id="posts" class="tab-panel all-posts" >
        <div class="all-posts" :key="post" v-for="post in Posts">
            
                <img class="single-post" :src=post.url alt="">
            
        </div>
     
  </section>
    <section id="badges" class="tab-panel">
        <ProfileBadges :Categories="Categories" :ChallengeSets="ChallengeSets" :ChallengeProgressions="ChallengeProgressions" :ChallengesInfo="ChallengesInfo"></ProfileBadges>
    </section>
    <section id="tickets" class="tab-panel">
      
    </section>
  </div>
  
</div>
  

</template>

<script>

import ProfileBadges from './ProfileBadges.vue'

export default {
	name: 'ProfileContent', 
    components: {
        ProfileBadges,
    },
    props: {
        Posts: Object,
        Badges: Object,
        Tickets: Object,
        Categories: Object,
        ChallengeSets: Object,
        ChallengeProgressions: Object,
        ChallengesInfo: Object,
    },
    data:function() {
        return {
        }
    },
	methods: {
	},
	mounted() {
		
	}
}
</script>

<style scoped>

.tabset > input[type="radio"] {
  position: absolute;
  left: -200vw;
}

.tabset .tab-panel {
  display: none;
}

.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
  display:flex;
    justify-content: left;
    width: 100vw;
    max-width: 400px;
}

/*
 Styling
*/

.tabset > label {

    font-family: "Akzidenz Medium";
    color: white;
    font-size: 14px;
    position: relative;
    border-bottom: 0;
    height: 40px;
    width:33.3333%;
}

.tabset > label::after {
  content: "";
  position: absolute;
  left: 0px;
  bottom: 1px;
  width: 100%;
  height: 4px;
  background: white;
}

.tabset > label:hover,
.tabset > input:focus + label {
  color: #EB5876;
}

.tabset > label:checked{
  color: #EB5876;
}

.tabset > label:hover::after,
.tabset > input:focus + label::after,
.tabset > input:checked + label::after {
  background: #EB5876;
  color: #EB5876;
}

.tabset > input:checked + label {
  border-color: white;
  
  margin-bottom: -1px;
}

.tab-panel {
    display:flex;
    justify-content: left;
    flex-wrap: wrap;
    width: 100vw;
    margin-top: 0;
}

.tabset {
    position: relative;
    margin-top: 25px;
    width: 100%;
    display: inline-flex;
    flex-wrap: wrap;
    
}

.all-posts {
    width: 33.33333%;

}

.all-posts img {
    display: block;
    max-width: 100%;
    height:130px;
    object-fit: cover;
}

</style>