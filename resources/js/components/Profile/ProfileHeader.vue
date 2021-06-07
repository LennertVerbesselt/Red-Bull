<template>

  <div class="settings">
    <svg class="settings-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.14 14.73"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Settings"><path class="cls-1" d="M1.17,8.65l-.9.52a.55.55,0,0,0-.2.75l1.29,2.23a.55.55,0,0,0,.75.2L3,11.82a1.46,1.46,0,0,1,1.46,0h0a1.46,1.46,0,0,1,.74,1.27v1.09a.55.55,0,0,0,.55.54H8.37a.54.54,0,0,0,.54-.54V13.1a1.46,1.46,0,0,1,.74-1.27h0a1.48,1.48,0,0,1,1.47,0l.9.53a.55.55,0,0,0,.75-.2L14,10.08a.73.73,0,0,0-.27-1h0L13,8.65a1.46,1.46,0,0,1-.73-1.28h0A1.47,1.47,0,0,1,13,6.08l.91-.52a.54.54,0,0,0,.19-.74L12.78,2.59a.55.55,0,0,0-.75-.2l-.91.52a1.46,1.46,0,0,1-1.46,0h0a1.45,1.45,0,0,1-.74-1.27V.55A.54.54,0,0,0,8.36,0H5.77a.54.54,0,0,0-.54.55V1.69a1.37,1.37,0,0,1-.69,1.18l-.11.07a1.39,1.39,0,0,1-1.37,0l-1-.55a.54.54,0,0,0-.75.2L.07,4.82a.54.54,0,0,0,.2.74l.9.52a1.48,1.48,0,0,1,.74,1.28v0A1.46,1.46,0,0,1,1.17,8.65Zm5.9-3.49A2.21,2.21,0,1,1,4.86,7.37,2.21,2.21,0,0,1,7.07,5.16Z"/></g></g></svg>
  </div>
  <div class="main-profile-header">
    <div class="avatar">
        
            <svg class="avatar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.44 14.78"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Profile"><path class="cls-1" d="M13.59,1.36A2.3,2.3,0,0,0,12.54,1c-.31,0-.62.08-.93.09C10.59,1.19,9,.05,8.89,0s-.17.06-.14.15a7.43,7.43,0,0,0,.73,1.12,2.21,2.21,0,0,0,.84.52c.69.28,1.43.41,2.13.68a1.61,1.61,0,0,1,.7.44,1.25,1.25,0,0,1-.06,1.45,3.41,3.41,0,0,1-.6.6.94.94,0,0,1-.67,0l0,.06a5.64,5.64,0,0,0-8,0L3.91,5a1,1,0,0,1-.65.06,2.75,2.75,0,0,1-.91-.71A1.26,1.26,0,0,1,2.3,2.93,1.66,1.66,0,0,1,3,2.48c.7-.26,1.44-.39,2.14-.67A2.15,2.15,0,0,0,6,1.28,6.48,6.48,0,0,0,6.73.16c0-.11,0-.19-.19-.15S4.86,1.19,3.83,1.13C3.52,1.12,3.22,1,2.9,1a2.26,2.26,0,0,0-1,.32A3.59,3.59,0,0,0,.29,5.92a4.23,4.23,0,0,0,1.6,1.8,1.56,1.56,0,0,1,.32.76,5.68,5.68,0,0,0,11.21,1.75,7.21,7.21,0,0,0,.11-1.13,6.83,6.83,0,0,0-.06-.79v0a1.62,1.62,0,0,1,.34-.79h0a4.18,4.18,0,0,0,1.37-1.63A3.58,3.58,0,0,0,13.59,1.36Z"/></g></g></svg>
        <div class="avatar-profile-picture">
            <img :src="ProfilePicture['url']" />
        </div>
        <div class="edit-profile">

        </div>

    </div>
    <div class="Stats">
        <div class="posts-amount">
            <span></span>
            <span>Posts</span>
        </div>
        <div class="followers-amount">
            <span></span>
            <span>Followers</span>
        </div>
        <div class="following-amount">
            <span></span>
            <span>Following</span>
        </div>

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
    height: 200px;

    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.avatar {
    position: relative;
    margin-left: 1rem;
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
    width: 65%;
    border-radius: 50%;
}

.avatar-profile-picture {
    position: absolute;
    bottom: 1%;
    left: 3%;
}

.stats {

}


</style>