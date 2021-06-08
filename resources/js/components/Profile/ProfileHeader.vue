<template>

  <div class="settings">
    <svg class="settings-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.14 14.73"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Settings"><path class="cls-1" d="M1.17,8.65l-.9.52a.55.55,0,0,0-.2.75l1.29,2.23a.55.55,0,0,0,.75.2L3,11.82a1.46,1.46,0,0,1,1.46,0h0a1.46,1.46,0,0,1,.74,1.27v1.09a.55.55,0,0,0,.55.54H8.37a.54.54,0,0,0,.54-.54V13.1a1.46,1.46,0,0,1,.74-1.27h0a1.48,1.48,0,0,1,1.47,0l.9.53a.55.55,0,0,0,.75-.2L14,10.08a.73.73,0,0,0-.27-1h0L13,8.65a1.46,1.46,0,0,1-.73-1.28h0A1.47,1.47,0,0,1,13,6.08l.91-.52a.54.54,0,0,0,.19-.74L12.78,2.59a.55.55,0,0,0-.75-.2l-.91.52a1.46,1.46,0,0,1-1.46,0h0a1.45,1.45,0,0,1-.74-1.27V.55A.54.54,0,0,0,8.36,0H5.77a.54.54,0,0,0-.54.55V1.69a1.37,1.37,0,0,1-.69,1.18l-.11.07a1.39,1.39,0,0,1-1.37,0l-1-.55a.54.54,0,0,0-.75.2L.07,4.82a.54.54,0,0,0,.2.74l.9.52a1.48,1.48,0,0,1,.74,1.28v0A1.46,1.46,0,0,1,1.17,8.65Zm5.9-3.49A2.21,2.21,0,1,1,4.86,7.37,2.21,2.21,0,0,1,7.07,5.16Z"/></g></g></svg>
  </div>
  <div class="main-profile-header">
    <div class="avatar">
        
            
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
  <div class="points">
      </div>


</template>

<script>


export default {
	name: 'Home', 
    components: {
        
    },
    props: {
        User: Object,
        ProfilePicture: Object,
        Profile: Object,
        ProfileStatistics: Object,
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
  height: 50px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.settings-icon {
  width: 25px;
  height: 25px;

  margin-right: 2%;

  fill: white;
}

.settings-icon:hover {
    fill: #EB5876;
}

.main-profile-header {
    position: relative;
    width: 100%;
    height: 100px;

    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.avatar {
    position: relative;
    margin-left: 1rem;
    margin-right: 1rem;
    width: 30%;
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
    border-radius: 50%;
    border: 3px solid white;
}

.avatar-profile-picture {
    position: relative;
}

.stats {
    display: inline-flex;
    justify-content: center;
    align-items: center;
}

.posts-amount {
    font-family: "Akzidenz Medium Condensed";
    font-size: 24px;
    color: white;

    width: 21%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.followers-amount {
    font-family: "Akzidenz Medium Condensed";
    font-size: 24px;
    color: white;

    width: 21%;
    display: inline-flex;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.following-amount {
    font-family: "Akzidenz Medium Condensed";
    font-size: 24px;
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
    font-size: 22px;
    color: white;
}


</style>