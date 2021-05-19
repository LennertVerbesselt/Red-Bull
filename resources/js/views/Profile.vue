<template>
    
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
	name: 'Home', 
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




</style>