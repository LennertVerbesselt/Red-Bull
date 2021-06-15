<template>
  <div class="container" v-for="event in events" :key="event" @click="ShowEventDescription = !ShowEventDescription">
      <div class="event-info">
           <div class="text">
             <h1>{{event.name}}</h1>
             <h2>{{getDatefromDatetime(event.datetime)}}</h2>
           </div>
           <div class="images">
             <img :src="event.headerurl" class="eventBG" alt="">        
             <img src="./../../../assets/EventGradient.png" class="gradient" alt="">
            </div>
     </div>
         <events-description v-if="ShowEventDescription" @click="ShowEventDescription = !ShowEventDescription" >
            <img class="eventHeader" src="./../../../assets/AirFlick.jpg" alt="">
            <img src="./../../../assets/gradient.png" class="gradient-description" alt="">
            <h1 class="eventTittle">{{event.name}}</h1>
            <h3 class="eventDate">{{getDatefromDatetime(event.datetime)}}</h3>
            <body class="eventDescription">
                {{event.description}}
            </body>
            <div class="prizeInfo">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
  <g id="Group_27" data-name="Group 27" transform="translate(-32 -392)">
    <rect id="Rectangle_170" data-name="Rectangle 170" width="8" height="29" transform="translate(43 392)" fill="#fff"/>
    <rect id="Rectangle_171" data-name="Rectangle 171" width="8" height="29" transform="translate(61 403) rotate(90)" fill="#fff"/>
  </g>
</svg>
            <h3>One step closer to win prizes!</h3>
            </div>
            <button class="buyButton">Buy Here</button>
       </events-description>
     </div>

        
</template>

<script>
import EventsDescription from './EventsDescription.vue';
export default {
  components: { EventsDescription },
    name: "EventsTotal",
    data: function () {
        return {
            events: [],
            ShowEventDescription:false,

        }   
    },
    setup() {
        return {
            EventsDescription
        }
    },

    methods: {
         getEvents() {
             axios.get('api/getevents').then(response => {
                
                this.events = response.data.events;
                console.log(response.data.events);
            });
        },
         getDatefromDatetime(datetime){
            var phpdate = String(datetime);
            var date = phpdate.substring(0,10);
            return date;
        }
        
   
    },

    created() {
        this.getEvents();
    }

}
   
</script>

<style scoped>
.eventBG {
    position: relative;
top: -100px;
width: 100%;
z-index: 1;

}
h1 {
    margin-top: 5px;
    margin-bottom: 0;
}
h2 {
    margin-top: 5px;
    
}
.text {
    position: relative;
    z-index: 5;
    padding-right: 15px;
}

.container {


    width: 100%;

}
 .event-info {
     text-align: right;
     color: white;
 }
.gradient {
    position:relative;
    height: 104px;
    width: 375px;
    top: 101.5px;
    right: 0;
    z-index: 2;


}
.eventHeader {
    width: 375px;
}
.prizeInfo {
    display: flex;
    justify-content: center;
    position: relative;
    top: -250px;
}
.prizeInfo svg{
   padding-top: 12px;
   padding-right:25px;
}
.eventDescription {
    position: relative;
    top:-300px;
}
.eventTittle {
    position: relative;
    top: -300px;
}

.buyButton{
    border: none;
    color: white;
    background-color: #EB5876;
    width: 91px;
    height: 36px;
    border-radius: 6px;
    font-weight: bold;
    position: relative;
    top: -150px;
}
.gradient-description {
    width: 375px;
    position: relative;
    top: -200px;
}
.eventDate {
    position: relative;
    top: -300px;
}


</style>