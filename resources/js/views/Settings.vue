<template>

<div class="SettingsHeader">
    <div class="back">
        <div class="back-text">
            <a @click="$router.go(-1)">Back</a>
        </div>
    </div>
    <div class="page-title">
        Settings
    </div>
</div>

<div class="segment-title"><span>Account Settings</span></div>
<div class="account-wrapper">
    <div class="profilepicture">
        <div class="profo">
        <img :src="ProfileData['profilepicture']['url']"  /></div><router-link to="/uploadprofilepicture">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 67.495 63.082">
            <g id="Group_39" data-name="Group 39" transform="translate(-64.893 -298.589)">
                <rect id="Rectangle_172" data-name="Rectangle 172" class="cls-1" width="10.624" height="5.843" rx="0.624" transform="matrix(0.728, 0.686, -0.686, 0.728, 124.654, 299.068)"/>
                <path id="Path_110" data-name="Path 110" class="cls-1" d="M104.443,334.545l-6.713-7.21a1.949,1.949,0,0,1,.3-2.712l19.239-16.936a1.949,1.949,0,0,1,2.719-.241l4.89,4.56a1.948,1.948,0,0,1-.3,2.713L107.161,334.3A1.949,1.949,0,0,1,104.443,334.545Z"/>
                <path id="Path_111" data-name="Path 111" class="cls-1" d="M99.24,333.411l3.858,4.134a1.3,1.3,0,0,1-.656,2.151l-5.51,1.274-5.51,1.275a1.3,1.3,0,0,1-1.534-1.644l1.651-5.409,1.651-5.409a1.3,1.3,0,0,1,2.191-.507Z"/>
                <path id="Path_112" data-name="Path 112" class="cls-1" d="M123.813,361.672h-52.9a6.031,6.031,0,0,1-6.024-6.024l1.489-51.124a6.01,6.01,0,0,1,6.022-5.935h37.829a3.048,3.048,0,0,1,0,6.1H72.405l-1.418,51.052,52.826-.161-.9-27.774a3.048,3.048,0,0,1,6.093-.18l.827,27.936A6.048,6.048,0,0,1,123.813,361.672Z"/>
            </g>
            </svg></router-link>

        
    </div>
    <div class="accountinfo">
        
            
                <div class="firstname"> First Name
            <input v-model="fields.first"  :placeholder="ProfileData['profile']['first_name']" /></div>
            <div class="lastname"> Last Name 
            <input  v-model="fields.last" :placeholder="ProfileData['profile']['last_name']" /></div>
        
    </div>
</div>

<div class="update">
<div class="button" @click="updateInfo">
        <div class="button-text">UPDATE INFO</div></div>
</div>

<div class="segment-title">GDPR Settings</div>
<div class="gdpr-wrapper">
    
    <div class="right">
        <div class="right-title">Right of acces:</div>
        <div class="button" @click="getAllData">
        <div class="button-text">GET YOUR DATA</div>
    </div>
    </div>

    <div class="right">
        <div class="right-title">Right of Correction:</div>
        <div class="button">
        <div class="button-text">SUBMIT A TICKET</div>
    </div>
    </div>

    <div class="right">
        <div class="right-title">Right to be Forgotten:</div>
        <div class="button">
        <div class="button-text">DELETE ACCOUNT</div>
    </div>
    </div>
</div>

<!--<div class="segment-title">Privacy Settings</div>
<div class="privacy-wrapper">
    
</div>-->
<div class="bottom-actions" >
<div class="button"  @click="logout">
        <div class="button-text">LOG OUT</div>
    </div>
<div class="button">
        <div class="button-text">APPLY CHANGES</div>
    </div>
</div>



<BottomMenu></BottomMenu>

<div class="loading" v-if="loading"><div class="bg"><div class="scaling-squares-spinner" :style="spinnerStyle">
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
</div></div></div>
    
</template>

<script>

import BottomMenu from './../components/BottomMenu.vue'

export default {
    name: "Settings",
    components: {
        BottomMenu,
    },
    props: {

    },
    data:function() {
        return {
            loading: true,
            fields: {
                first: "",
                last: "",
            },
            ProfileData: {
                profilepicture: {
                    url: "https://redbullapp.s3.eu-west-2.amazonaws.com/ProfilePictures/default.jpg",
                },
                profile: {
                    first_name: "loading",
                    last_name: "loading",
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

        getAllData() {
            this.loading = true;
            axios.get('api/getalldata').then(response => {
                
                const blob = new Blob([response.data.textfile], { type: 'text' });
                
                const link = document.createElement('a');
                
                link.href = URL.createObjectURL(blob);
                this.loading = false;
                
                link.download = "Your data";
                link.click();
                URL.revokeObjectURL(link.href);

            }).catch(error => {
                this.loading = false;
                console.log("Errorrrr");
            });
        },

        deleteAllData() {

        },

        logout(){
            this.loading = true;
            axios.post('api/logout').then(response => {
                this.$router.push('/login');
            }).catch(error => {
                console.log("Couldn't log out!");
                this.loading = false;
            });
        },

        getProfileData() {
            this.loading=true;
            axios.get('api/getprofiledata').then(response => {
                //Do smth
                this.ProfileData = response.data.profiledata;
                this.fields.first = this.ProfileData.profile.first_name;
                this.fields.last = this.ProfileData.profile.last_name;
                this.loading=false;
            }).catch(error => {
                console.log("Something went wrong, whoops");
                this.loading = false;
            });
        },

        updateInfo(){
            this.loading =true;
            axios.post('api/updateinfo', {firstname: this.fields.first, lastname: this.fields.last}).then( response => {
                this.getProfileData();
                this.loading = false;
            }).catch(error => {
                console.log("Something went wrong, whoops");
                this.loading = false;
            });
        }



    },
    created() {
        this.checkIfLoggedIn();
        this.getProfileData();

    },
    mounted() {

    }
}
</script>

<style scoped>

.SettingsHeader {
    width: 100%;
    height: 60px;
    position: relative;
    left: 0;

    display: flex;
    justify-content: center;
    align-items: center;

    border-bottom: 2px solid white;
}

.back-text {
    font-family: "Akzidenz Medium";
    font-size: 16px;
    color: white;
    position: absolute;
    top: 20px;
    left: 25px;
}

.page-title {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
    color: white;
}

.segment-title {
    font-family: "Akzidenz Bold Extended";
    font-size: 22px;
    color:white;

    margin-left: 10px;
    margin-top: 20px;
    
    display: flex;
    flex-flow: row;
    justify-content: flex-start;
    align-items: center;
}

.account-wrapper, .privacy-wrapper, .gdpr-wrapper {
    width: 100%;
    margin-top: 15px;
    position: relative;
    display: flex;
    flex-flow: column;
    justify-content: flex-start;
    align-items: center;
}

.right {
    position: relative;
    width: 94%;
    height: 30px;
    left: 0%;
    margin: 10px 0px;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.right-title {
    font-family: "Akzidenz Medium";
    font-size: 16px;
    color:white;
    text-align: right;
}

.button {
    width: 130px;
    height: 25px;

    margin-left: 10px;
    margin-right: 10px;

    background-color: #EB5876;

    
    box-shadow: 0px 0px 3px #EB5876;

    display: flex;
    justify-content: center;
    align-items: center;

    -ms-transform: skewX(-30deg);
    -webkit-transform: skewX(-30deg);
    transform: skewX(-30deg);
}

.button-text {
    font-family: "Akzidenz Medium";
    font-size: 12px;
    color: white;
    text-decoration: none;
    -ms-transform: skewX(30deg);
    -webkit-transform: skewX(30deg);
    transform: skewX(30deg); 
    
}

.bottom-actions {
    margin: 50px 0px;
    width: 100%;
    position: relative;

    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.profilepicture{
    width: 40%;
}

.profo {
    margin: 15px 0px;
}

.profo img {
    max-width: 70px;
    max-height: 70px;

    border-radius: 50%;
    border: 5px solid white;
}

.accountinfo {
    width: 90%;
    position: relative;
    left: 10%; 
}

.profilepicture svg {
    fill: white;
    width: 25px;
    height: 25px;;
}

.accountinfo input{
    width: 100%;
    margin-top: 5px;
}



.firstname, .lastname {
    width: 60%;
    

    font-family: "Akzidenz Bold";
    font-size: 16px;
    color: white;
    text-align: left;

    margin: 10px 0px;
}

.account-wrapper{
    position: relative;
    width: 90%;
    left: 5%;
    display: flex;
    flex-flow: row;

    margin-bottom: 25px;
}

.update {
    width: 100%;
    height: 80px;
    display:flex;
    justify-content: center;
    align-items: center;    
}
</style>