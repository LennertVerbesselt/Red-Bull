<template>

<div id='rssBlock'>
   <p class="cnnContents">
       <span class="marqueeStyle">&nbsp;{{User['name'].toUpperCase()}}&nbsp; </span>
        <span class="marqueeStyle2">&nbsp;{{User['name'].toUpperCase()}}&nbsp;</span>
      </p>
      </div>

  <div class="settings">
    <svg class="settings-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.14 14.73"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Settings"><path class="cls-1" d="M1.17,8.65l-.9.52a.55.55,0,0,0-.2.75l1.29,2.23a.55.55,0,0,0,.75.2L3,11.82a1.46,1.46,0,0,1,1.46,0h0a1.46,1.46,0,0,1,.74,1.27v1.09a.55.55,0,0,0,.55.54H8.37a.54.54,0,0,0,.54-.54V13.1a1.46,1.46,0,0,1,.74-1.27h0a1.48,1.48,0,0,1,1.47,0l.9.53a.55.55,0,0,0,.75-.2L14,10.08a.73.73,0,0,0-.27-1h0L13,8.65a1.46,1.46,0,0,1-.73-1.28h0A1.47,1.47,0,0,1,13,6.08l.91-.52a.54.54,0,0,0,.19-.74L12.78,2.59a.55.55,0,0,0-.75-.2l-.91.52a1.46,1.46,0,0,1-1.46,0h0a1.45,1.45,0,0,1-.74-1.27V.55A.54.54,0,0,0,8.36,0H5.77a.54.54,0,0,0-.54.55V1.69a1.37,1.37,0,0,1-.69,1.18l-.11.07a1.39,1.39,0,0,1-1.37,0l-1-.55a.54.54,0,0,0-.75.2L.07,4.82a.54.54,0,0,0,.2.74l.9.52a1.48,1.48,0,0,1,.74,1.28v0A1.46,1.46,0,0,1,1.17,8.65Zm5.9-3.49A2.21,2.21,0,1,1,4.86,7.37,2.21,2.21,0,0,1,7.07,5.16Z"/></g></g></svg>
  </div>
  


  <div class="main-profile-header">
    

    
    <div class="avatar">

        <svg class="avatar-horns" xmlns="http://www.w3.org/2000/svg" width="116.617" height="63.827" viewBox="0 0 116.617 63.827">
            <g id="Group_56" data-name="Group 56" transform="translate(-1180.355 -521.241)">
                <path id="Path_30" data-name="Path 30" d="M129.887,47.044c-3.485-2.129-8.761-4.353-11.063-7.736a9.94,9.94,0,0,1-.434-11.45,12.563,12.563,0,0,1,5.488-3.525c5.5-2.129,11.371-3.138,16.843-5.307a17.009,17.009,0,0,0,6.584-4.163,52.735,52.735,0,0,0,6.024-8.824c.276-.938-.276-1.53-1.514-1.222s-13.24,9.313-21.322,8.855c-2.452-.142-4.857-.765-7.31-.71a18.123,18.123,0,0,0-8.272,2.484A28.306,28.306,0,0,0,102.588,51.42,33.011,33.011,0,0,0,121.15,68.563" transform="translate(1080.077 516.505)" fill="#fff"/>
                <path id="Path_31" data-name="Path 31" d="M133.967,46.969a29.178,29.178,0,0,0,9.384-7.736,9.968,9.968,0,0,0,.434-11.442,12.6,12.6,0,0,0-5.5-3.533c-5.5-2.121-11.371-3.13-16.835-5.3a16.86,16.86,0,0,1-6.584-4.163A53.171,53.171,0,0,1,109.1,6.021c-.221-.718-.079-1.482,1.088-1.222s13.4,9.257,21.48,8.8c2.444-.142,4.865-.765,7.318-.71a18.121,18.121,0,0,1,8.264,2.484,28.294,28.294,0,0,1,12.325,35.965,33.021,33.021,0,0,1-18.554,17.143" transform="translate(1135.084 516.58)" fill="#fff"/>
            </g>
        </svg>
        
            
        <div class="avatar-profile-picture">
            
            <img :src="ProfilePicture['url']" />
        </div>
        <div class="edit-profile">

        </div>

    </div>
    
        <div class="posts-amount">
            <span class="amount-number">{{ProfileStatistics['amount_of_posts']}}</span>
            <span class="posts-amount-text">Posts</span>
        </div>
        <div class="followers-amount">
            <span class="amount-number">{{ProfileStatistics['followers']}}</span>
            <span>Followers</span>
        </div>
        <div class="following-amount">
            <span class="amount-number">{{ProfileStatistics['following']}}</span>
            <span>Following</span>
        </div>

        

        

    
  </div>

  <ProfileSubHeader :CurrencyPoints="CurrencyPoints" ></ProfileSubHeader>
  

  

</template>

<script>

import ProfileSubHeader from './ProfileSubHeader.vue'

export default {
	name: 'ProfileHeader', 
    components: {
        ProfileSubHeader,
    },
    props: {
        User: Object,
        ProfilePicture: Object,
        Profile: Object,
        ProfileStatistics: Object,
        CurrencyPoints: Object,
        Categories: Object,
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

.settings {
  position: relative;
  top:0;
  width: 100%;
  height: 0px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  z-index: 2;
}

.settings-icon {
  width: 15px;
  height: 15px;

  margin-right: 5%;
  padding-top: 45px;

  fill: white;
}

.settings-icon:hover {
    fill: #EB5876;
}

.main-profile-header {
    position: relative;
    width: 90%;
    left: 5%;
    height: 150px;

    display: flex;
    justify-content: space-around;
    align-items: center;
}

.avatar {
    position: relative;
    width: 30%;
    height:150px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.avatar-icon {
    width: 100%;
    fill: white;
    
}

.avatar-profile-picture img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    border: 3px solid white;
}

.avatar-profile-picture {
    position: relative;
}

.avatar-horns{
    position: absolute;
    width: 90px;
    top: 15px;
    left: 9px;
}

.stats {
    display: inline-flex;
    justify-content: center;
    align-items: center;
}

.posts-amount {
    font-family: "Akzidenz Regular";
    font-size: 14px;
    color: white;

    width: 21%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.followers-amount {
    font-family: "Akzidenz Regular";
    font-size: 14px;
    color: white;

    width: 21%;
    display: inline-flex;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.following-amount {
    font-family: "Akzidenz Regular";
    font-size: 14px;
    color: white;

    width: 21%;
    display: inline-flex;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.amount-number {
    font-family: "Akzidenz Medium";
    font-size: 18px;
    color: white;
}

.background-username {
    position: absolute;
    width: 100%;
    left:-5%;
    top:0;

    font-family: "Akzidenz Bold";
    font-size: 120px;
    text-align: center;
    color:white;
    opacity: 0.1;
}





#rssBlock{
  left:0px;
  height: 150px;
  
  position: absolute;
  width:100%;
  display: flex;
  align-items: center;
  overflow-x: hidden;
}

/*remove p*/
.cnnContents {
  width:450px;
  margin:0 auto;
  font-size: 120px;
  
  white-space: nowrap;
  text-transform: uppercase;
  
}

.marqueeStyle {
    font-family: "Akzidenz Bold Extended";
  Color: white;
  opacity: 0.1;
  white-space: nowrap;
  
  display:inline-block;
  /* Apply animation to this element */
  -webkit-animation: scrolling-left1 20s linear infinite;
  animation: scrolling-left1 20s linear infinite;
}

.marqueeStyle2 {
    font-family: "Akzidenz Bold Extended";
  Color: white;
  opacity: 0.1;
  white-space: nowrap;

  
  
  display:inline-block;
  /* Apply animation to this element */
  -webkit-animation: scrolling-left2 20s linear infinite;
  animation: scrolling-left2 20s linear infinite;
  animation-delay: 10s;
}
/* scrolling-left is continuous/repeatly text */
@keyframes scrolling-left1 {
    0% {transform: translateX(100%);
        -webkit-transform: translateX(100%);}
      100% {transform: translateX(-100%);
          -webkit-transform: translateX(-100%);}
}
@keyframes scrolling-left2 {
    0% {transform: translateX(0%);
        -webkit-transform: translateX(0%);}
      100% {transform: translateX(-200%);
          -webkit-transform: translateX(-200%);}
}

@-webkit-keyframes scrolling-left1 {
    0% {-webkit-transform: translateX(100%);}
      100% {-webkit-transform: translateX(-100%);}
}
@-webkit-keyframes scrolling-left2 {
    0% {-webkit-transform: translateX(0%);}
      100% {-webkit-transform: translateX(-200%);}
}

</style>