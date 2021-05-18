<template>
    <svg class="Profile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="2 2 18 18" style="enable-background:new 0 0 20 20;" xml:space="preserve">

            <g>
                <g id="Profile_1_" transform="translate(-2.512 -1.002)">
                    <path id="Path_30" class="st0" d="M8.66,8.77C8.22,8.5,7.55,8.22,7.26,7.79c-0.32-0.42-0.34-1-0.05-1.45    c0.19-0.21,0.43-0.36,0.7-0.45c0.7-0.27,1.44-0.4,2.14-0.67c0.32-0.11,0.6-0.29,0.84-0.53c0.27-0.3,0.73-1,0.76-1.12    c0.03-0.12-0.03-0.19-0.19-0.15c-0.16,0.04-1.68,1.18-2.7,1.12c-0.31-0.02-0.62-0.1-0.93-0.09C7.44,4.47,7.08,4.57,6.76,4.76    C5.14,5.65,4.47,7.63,5.2,9.32c0.47,1.01,1.31,1.79,2.35,2.17"/>
                    <path id="Path_31" class="st0" d="M16.81,8.77C17.27,8.53,17.68,8.2,18,7.79c0.32-0.42,0.34-1,0.05-1.45    c-0.19-0.21-0.43-0.36-0.7-0.45c-0.7-0.27-1.44-0.4-2.13-0.67c-0.32-0.11-0.6-0.29-0.84-0.53c-0.27-0.3-0.7-1.02-0.73-1.11    c-0.03-0.09-0.01-0.19,0.14-0.15c0.15,0.03,1.7,1.17,2.72,1.12c0.31-0.02,0.62-0.1,0.93-0.09c0.37,0.02,0.73,0.13,1.05,0.32    c1.62,0.89,2.29,2.87,1.56,4.56c-0.46,1.01-1.31,1.79-2.35,2.17"/>
                    <path id="Path_48" class="st1" d="M12.75,7.08c2.99,0,5.42,2.43,5.42,5.42c0,0.36-0.04,0.72-0.11,1.07    c-0.59,2.93-3.45,4.83-6.39,4.24s-4.83-3.45-4.24-6.39C7.95,8.9,10.17,7.08,12.75,7.08z"/>
                </g>
                <path class="st0" d="M4.24,10.1c0,0,0.34,0.42,0.34,0.79l0.19-0.64L4.24,10.1z"/>
                <path class="st0" d="M16.2,9.95c0,0-0.34,0.42-0.34,0.79l-0.19-0.64L16.2,9.95z"/>
                <path class="st0" d="M14.21,7.42c0,0,0.32,0.13,0.69-0.04l-0.41,0.47L14.21,7.42z"/>
                <path class="st0" d="M5.62,7.47c0,0,0.32,0.13,0.69-0.04L5.89,7.9L5.62,7.47z"/>
            </g>
            
            </svg>
            <img :src="profilepicture" class="profilepic" />

            
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
svg {
     display: flex;
     flex-grow: 1;
     min-width: 20px;
     overflow: hidden;
     white-space: nowrap;
     fill: rgb(85, 85, 85);
     padding: 10px;
 }

 svg:hover{
     fill: white;
 }

 .profilepic {
     position: relative;
     top:13px;
     right:55px;
     display: block;
    border-radius: 50%;
    width: 12px;
    height:12px;
 }

</style>