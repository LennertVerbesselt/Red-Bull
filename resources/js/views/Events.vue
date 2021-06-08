<template>

<div class="titleBG">
      <h1 class="pagetitle">Under Construction</h1>
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


export default {
	name: 'Events', 
    components: {
        BottomMenu,
        Carousel,
		CarouselInfo,
		FeedPost,
		PostItem,
		FeedNavigation,
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

.titleBG {
  width:100%;
  height: 300px;
  background: #252525;
	background: linear-gradient(180deg, rgba(18,20,38,1) 0%, rgba(18,20,38,0) 100%);
	top: 300px;
	left: 0;
	right: 0;
	bottom: 0;
  position: absolute;

  z-index: 2;
}

.pagetitle {
  position: absolute;
  font-family: "Akzidenz Bold Extended";
  color:white;
  font-size: 28px;
  letter-spacing: 1px;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  text-align: center;

  width:100%;
  height: 100%;
  top: -30%;
  
  z-index: 3;
}


</style>