<template>
  <div class="container" v-for="event in events" :key="event">
      <div class="event-info">
          <div class="text">
          <h1>{{event.name}}</h1>
         <h2>20/03</h2>
         </div>
           <div class="images">
      <img src="./../../../assets/Airflick.jpg" class="eventBG" alt="">        
      <img src="./../../../assets/EventGradient.png" class="gradient" alt="">
     </div>
     </div>
       </div>
</template>

<script>
export default {
    data: function () {
        return {
            events:[],

    }
},

methods: {
         getEvents() {
             axios.get('api/getevents').then(response => {
                
                this.events = response.data.events;
                console.log(response.data.events);
                return response.data.events;
            });
        }
   
    },

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

    height: 104px;
    width: 100%;
}
 .event-info {
     text-align: right;
     color: white;
 }
.gradient {

    height: 104px;
    width: 375px;
    position: absolute;
    top: 101.5px;
    right: 0;
    z-index: 2;


}
 .container  {
   overflow: hidden;

 }
</style>