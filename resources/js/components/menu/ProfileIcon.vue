<template>
<div class="profilenav">
            <!--<img src="./../../../assets/profileIcon.svg" class="profileicon navicon" />-->
            <img :src="profilepicture" class="profilepic" />

</div>
</template>

<script> 

//import Vue from 'vue';
//Vue.forceUpdate();

export default {
    name:'ProfileIcon',
    
    data: function () {
        return {
            profilepicture: "https://redbullapp.s3.eu-west-2.amazonaws.com/ProfilePictures/default.jpg",
        }
    },
    methods: {
        getProfilePicture(){
            axios.get('api/getprofilepicture').then(response => {
                
                this.profilepicture = response.data.url;
                return response.data.url;
            });
        }
    },
    created() {
        this.getProfilePicture();
    }
}
</script>

<style>
.profileicon{
     width: 30px;
    height:30px;
     padding: 5px;

 }

 .profilepic {
    border-radius: 50%;
    width: 20px;
    height:20px;
    padding: 10px;
    

 }

</style>