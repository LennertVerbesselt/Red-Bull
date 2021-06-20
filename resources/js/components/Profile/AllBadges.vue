<template>
<div class="all-badges-">
    <div class="all-badges-header-image">
        
        <div class="avatar">

            <svg class="avatar-horns" xmlns="http://www.w3.org/2000/svg" width="116.617" height="63.827" viewBox="0 0 116.617 63.827">
                <g id="Group_56" data-name="Group 56" transform="translate(-1180.355 -521.241)">
                    <path id="Path_30" data-name="Path 30" d="M129.887,47.044c-3.485-2.129-8.761-4.353-11.063-7.736a9.94,9.94,0,0,1-.434-11.45,12.563,12.563,0,0,1,5.488-3.525c5.5-2.129,11.371-3.138,16.843-5.307a17.009,17.009,0,0,0,6.584-4.163,52.735,52.735,0,0,0,6.024-8.824c.276-.938-.276-1.53-1.514-1.222s-13.24,9.313-21.322,8.855c-2.452-.142-4.857-.765-7.31-.71a18.123,18.123,0,0,0-8.272,2.484A28.306,28.306,0,0,0,102.588,51.42,33.011,33.011,0,0,0,121.15,68.563" transform="translate(1080.077 516.505)" fill="#fff"/>
                    <path id="Path_31" data-name="Path 31" d="M133.967,46.969a29.178,29.178,0,0,0,9.384-7.736,9.968,9.968,0,0,0,.434-11.442,12.6,12.6,0,0,0-5.5-3.533c-5.5-2.121-11.371-3.13-16.835-5.3a16.86,16.86,0,0,1-6.584-4.163A53.171,53.171,0,0,1,109.1,6.021c-.221-.718-.079-1.482,1.088-1.222s13.4,9.257,21.48,8.8c2.444-.142,4.865-.765,7.318-.71a18.121,18.121,0,0,1,8.264,2.484,28.294,28.294,0,0,1,12.325,35.965,33.021,33.021,0,0,1-18.554,17.143" transform="translate(1135.084 516.58)" fill="#fff"/>
                </g>
            </svg>
            
                
            <div class="avatar-profile-picture">
                
                <img :src="ProfileData['profilepicture']['url']" />
            </div>
        </div>
        
    </div>
    <div class="username">
            {{ProfileData.profile.first_name}} {{ProfileData.profile.last_name}}
        </div>
</div>

<ProfileSubHeader :CurrencyPoints="ProfileData['currencypoints']" ></ProfileSubHeader>

<div class="all-badges">
    <div class="badge" :key="badge" v-for="badge in ProfileData.allbadges">
        <div class="badge-image">
            <img :src="badge.badge" />
        </div>
        <div class="badge-name">
            {{badge.name}}
        </div>
        <div class="badge-rarity">

        </div>
    </div>
</div>
  
  <BottomMenu> </BottomMenu>

</template>

<script>

import BottomMenu from "../BottomMenu.vue"
import ProfileSubHeader from './ProfileSubHeader.vue'

export default {
	name: 'AllBadges', 
    components: {
        BottomMenu,
        ProfileSubHeader,
    },
    props: {
        
    },
    data:function() {
      return {
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

.all-badges-header {
    width: 100%;
    position: relative;
    margin-top: 20px;
    
}

.all-badges-header-image {
    position: relative;
    width: 100%;
    left: 0%;
    top: 20px;
    height: 150px;

    display: flex;
    justify-content: space-around;
    align-items: center;
}

.avatar {
    position: relative;
    width: 120px;
    height:190px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.avatar-icon {
    width: 100%;
    fill: white;
    
}

.avatar-profile-picture img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 3px solid white;
}

.avatar-profile-picture {
    position: relative;
}

.avatar-horns{
    position: absolute;
    width: 120px;
    top: 30px;
    left: 0px;
}

.username {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
    color:white;
    margin-bottom: 30px;
}

.all-badges {
    position: relative;
    width:100%;
    margin-top: 30px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
}

.badge {
    width: 33%;
    height: 100px;
    display: flex;
    justify-content: center;
    flex-flow: column;
    align-items: center;
}

.badge-image img {
    width: 45%;
}

.badge-name {
    font-family: "Akzidenz Regular";
    font-size: 14px;
    color:white;
    opacity: .6;
}


</style>