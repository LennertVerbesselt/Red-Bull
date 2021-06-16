<template>
<ProfileHeader :Profile="ProfileData['profile']" :ProfilePicture="ProfileData['profilepicture']" :ProfileStatistics="ProfileData['profilestatistics']" :User="ProfileData['user']"  :CurrencyPoints="ProfileData['currencypoints']" :Categories="ProfileData['categories']"></ProfileHeader>
  
  <ProfileContent :Posts="ProfileData['posts']" :Categories="ProfileData['categories']" :ChallengeSets="ProfileData['challengesets']" :ChallengeProgressions="ProfileData['challengeprogressions']" :ChallengesInfo="ProfileData['challengesinfo']"></ProfileContent>
    
   <BottomMenu> </BottomMenu>

   <div class="loading" v-if="loading"><div class="bg"><div class="scaling-squares-spinner" :style="spinnerStyle">
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
</div></div></div>

</template>

<script>
import BottomMenu from "./../components/BottomMenu.vue"
import ProfileHeader from "./../components/Profile/ProfileHeader.vue"
import ProfileContent from "./../components/Profile/ProfileContent.vue"


export default {
	name: 'Profile', 
    components: {
        BottomMenu,
        ProfileHeader,
        ProfileContent,
    },
    data:function() {
      return {
        loading: true,
        ProfileData: {
          profilepicture: {
            url: "https://redbullapp.s3.eu-west-2.amazonaws.com/ProfilePictures/default.jpg",
          },
          profilestatistics: {
            amount_of_posts: 0,
            followers: 0,
            following: 0,
          },
          user: {
            name: "LOADING",
          },
          profile: {
            first_name: "LOADING",
          }, 
          currencypoints: {

          },
          categories: {

          },
          posts: {
            url: "https://redbullapp.s3.eu-west-2.amazonaws.com/ProfilePictures/default.jpg",
          }
        },
      }
    },
	methods: {
		checkIfLoggedIn() {
            axios.get('api/getsessiondata').then(response => {
            }).catch(error => {
                console.log("Error");
				this.$router.push('/login');
            });
        },
    getProfileData() {
      axios.get('api/getprofiledata').then(response => {
        //Do smth
        this.ProfileData = response.data.profiledata;
        console.log(response.data.profiledata);
        this.loading=false;
      }).catch(error => {
        console.log("Something went wrong, whoops");
      });
    },
	},
	created() {
    this.getProfileData();
		this.checkIfLoggedIn();
	},
  mounted() {
  }
}
</script>

<style scoped>

.loading {
  position: absolute;
  top: 0;
  left: 0;

  width: 100vw;
  height: 100vh;

  color: rgba(16,20,38, 0.5);

}

.bg{
  position: relative;
  width: 100%;
  height: 100%;
  background-color: rgba(16,20,38, 0.8);
  z-index: 8;

  display: flex;
  flex-flow: column;
  justify-content: center;
  align-items: center;
}

.scaling-squares-spinner, .scaling-squares-spinner * {
      box-sizing: border-box;
    }

    .scaling-squares-spinner {
      height: 65px;
      width: 65px;
      position: relative;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      animation: scaling-squares-animation 1250ms;
      animation-iteration-count: infinite;
      transform: rotate(0deg);
    }

    .scaling-squares-spinner .square {
      height: calc(65px * 0.25 / 1.3);
      width: calc(65px * 0.25 / 1.3);
      margin-right: auto;
      margin-left: auto;
      border: calc(65px * 0.04 / 1.3) solid #EB5876;
      position: absolute;
      animation-duration: 1250ms;
      animation-iteration-count: infinite;
    }

    .scaling-squares-spinner .square:nth-child(1) {
      animation-name: scaling-squares-spinner-animation-child-1;
    }

    .scaling-squares-spinner .square:nth-child(2) {
      animation-name: scaling-squares-spinner-animation-child-2;
    }

    .scaling-squares-spinner .square:nth-child(3) {
      animation-name: scaling-squares-spinner-animation-child-3;
    }

    .scaling-squares-spinner .square:nth-child(4) {
      animation-name: scaling-squares-spinner-animation-child-4;
    }


    @keyframes scaling-squares-animation {

      50% {
        transform: rotate(90deg);
      }

      100% {
        transform: rotate(180deg);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-1 {
      50% {
        transform: translate(150%,150%) scale(2,2);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-2 {
      50% {
        transform: translate(-150%,150%) scale(2,2);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-3 {
      50% {
        transform: translate(-150%,-150%) scale(2,2);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-4 {
      50% {
        transform: translate(150%,-150%) scale(2,2);
      }
    }


</style>