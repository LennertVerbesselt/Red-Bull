<template>
    <div class="menu">
    <nav class="nav">
        <router-link to="/"><HomeIcon></HomeIcon></router-link>
        <router-link to="/challenges"><TrophyIcon></TrophyIcon></router-link>
        <router-link to="/qrscanner"><QRIcon></QRIcon></router-link>
        <router-link to="/register"><CalendarIcon></CalendarIcon></router-link>
        <router-link to="/Profile"><ProfileIcon></ProfileIcon></router-link>
        

        
        
      
        
        
    </nav>
    </div>
</template>
<script>
import HomeIcon from './menu/HomeIcon'
import TrophyIcon from './menu/TrophyIcon'
import QRIcon from './menu/QRIcon.vue'
import CalendarIcon from './menu/CalendarIcon.vue'
import ProfileIcon from './menu/ProfileIcon.vue'


export default {
    name: "BottomMenu",
    components: {
        HomeIcon,
        TrophyIcon,
        QRIcon,
        CalendarIcon,
        ProfileIcon
    },
}
</script>

<style scoped>
body {
    margin: 0 0 55px 0;
}
.menu {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #121426;
    border: 2px 0px 0px 0px solid white;
     height: 45px;
}
 .nav {
     left: 3%;
     right:3%;
     position: fixed;
     bottom: 0;
     width: 94%;
     height: 44px;
     background-color: #121426;

     display: flex;
     flex-direction: row;
     flex-wrap: nowrap;
     justify-content: space-between;
     align-items: baseline;

     overflow-x: auto;
 }
 
.navicon{
    width: 20px;
    height:20px;
    padding: 10px;
 }

 
</style>