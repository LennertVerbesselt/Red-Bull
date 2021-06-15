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
         <events-description v-if="ShowEventDescription" @click="getDescription" :Post="event" ></events-description>
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
        },
        getDescription() {
            this.ShowEventDescription = !this.ShowEventDescription;
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





</style>