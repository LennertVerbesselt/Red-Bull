<template>
    <div class="menu">
    <nav class="nav">
        <HomeIcon></HomeIcon>
        <TrophyIcon></TrophyIcon>
        <QRIcon></QRIcon>
        <CalendarIcon></CalendarIcon>
        <ProfileIcon></ProfileIcon>

        
        
      
        
        
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
    }
}
</script>

<style scoped>
body {
    margin: 0 0 55px 0;
}
 .nav {
     left: 0;
     position: fixed;
     bottom: 0;
     width: 100%;
     height: 55px;
     box-shadow: 0 0 3px rgba(44, 44, 44, 0.178);
     background-color: #191d38;
     display: flex;
     overflow-x: auto;
 }
 
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
</style>