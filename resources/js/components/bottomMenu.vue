<template>
    <div class="menu">
    <nav class="nav">
        <homeIcon></homeIcon>
        <trophyIcon></trophyIcon>
        <qrIcon></qrIcon>
        <calendarIcon></calendarIcon>
        <profileIcon></profileIcon>

        
        
      
        
        
    </nav>
    </div>
</template>
<script>
import homeIcon from './homeIcon'
import trophyIcon from './trophyIcon'
import qrIcon from './qrIcon.vue'
import calendarIcon from './calendarIcon.vue'
import profileIcon from './profileIcon.vue'

export default {
    components: {
        homeIcon,
        trophyIcon,
        qrIcon,
        calendarIcon,
        profileIcon
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