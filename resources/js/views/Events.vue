<template>
<div class="container">

      <h1 class="pagetitle">Upcoming Events</h1>
      <EventsTotal class="events"></EventsTotal>
</div>

      
    
    
    
   <BottomMenu> </BottomMenu>

</template>

<script>
import Carousel from '../components/Carousel'
import CarouselInfo from '../components/CarouselInfo'
import BottomMenu from '../components/BottomMenu'
import FeedPost from '../components/Feed/FeedPost'
import PostItem from '../components/Feed/PostItem'
import FeedNavigation from '../components/Feed/FeedNavigation'
import EventsTotal from '../components/Events/EventsTotal'


export default {
	name: 'Events', 
    components: {
        BottomMenu,
        Carousel,
		CarouselInfo,
		FeedPost,
		PostItem,
		FeedNavigation,
    EventsTotal
    },
	methods: {
		checkIfLoggedIn() {
            axios.get('api/getsessiondata').then(response => {
            }).catch(error => {
                console.log("Error");
				this.$router.push('/login');
            });
        }
	},
	mounted() {
		this.checkIfLoggedIn();
	}
}
</script>

<style scoped>
.events {
  margin-top: 50px;
}


.pagetitle {
  font-family: "Akzidenz Bold";
  color:white;
  font-size: 28px;
  letter-spacing: 1px;
  
}


</style>