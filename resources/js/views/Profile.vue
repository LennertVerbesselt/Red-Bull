<template>
<ProfileHeader :Profile="ProfileData['profile']" :ProfilePicture="ProfileData['profilepicture']" :ProfileStatistics="ProfileData['profilestatistics']" :User="ProfileData['user']"  :CurrencyPoints="ProfileData['currencypoints']" :Categories="ProfileData['categories']"></ProfileHeader>
  
  <ProfileContent :Posts="ProfileData['posts']"></ProfileContent>
    
   <BottomMenu> </BottomMenu>

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
        console.log(response.data.profiledata.profilepicture);
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


</style>