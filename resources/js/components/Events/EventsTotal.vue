<template>
  <div  :class="[ShowEventDescription ? 'description' : 'container']" v-for="event in events" :key="event" @click="ShowEventDescription = !ShowEventDescription">
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
         <events-description  v-if="ShowEventDescription" @click="getDescription" :Post="event" ></events-description>
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
* {

}
.images {
    position: relative;
top: -100px;
height: 104px;
overflow: hidden;

}
.eventBG {
    width: 400px;
    margin: 0;
    padding: 0;
    z-index: 2;
    position: relative;
    top: -50px;

}
h1 {
    font-family: "Akzidenz Bold";
    margin-top: 5px;
    margin-bottom: 0;
}
h2 {
    margin-top: 5px;
    font-family: "Akzidenz Light";
    font-size: 20px;
    
}
.text {
    position: relative;
    z-index: 5;
    padding-right: 15px;
}

.container {

    height: 104px;
    width: 100%;

}
.description {
    height: 700px;
    width: 100%;

}
 .event-info {
     text-align: right;
     color: white;
     height: 130px;
 }
.gradient {
 
position: relative;
top: -320px;
z-index: 4;
height: 200px;

}





</style>