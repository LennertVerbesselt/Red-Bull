<template>
    <Carousel class="carousel"></Carousel>
	<FeedTotal></FeedTotal>
   <BottomMenu> </BottomMenu>

</template>

<script>
import Carousel from '../components/Carousel'
import CarouselInfo from '../components/CarouselInfo'
import BottomMenu from '../components/BottomMenu'
import FeedPost from '../components/Feed/FeedPost'
import PostItem from '../components/Feed/PostItem'
import FeedNavigation from '../components/Feed/FeedNavigation'
import FeedTotal from '../components/Feed/FeedTotal'


export default {
	name: 'Home', 
    components: {
        BottomMenu,
        Carousel,
		CarouselInfo,
		FeedPost,
		PostItem,
		FeedNavigation,
		FeedTotal,
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
	created() {
		this.checkIfLoggedIn();
	}
}
</script>

<style scoped>
.carousel {
    position: relative;
    top: 0;
}

.carousel:after {
	/*background: #252525;
	/*background: linear-gradient(180deg, rgba(255, 255, 255, 0.0000), rgba(18, 20, 38, 1));*/
	top: 50px;
	left: 0;
	right: 0;
	bottom: 0;
	content: " ";
	position: absolute
}



button {
			background-color: transparent;
			border: 1px solid #fff;
			border-radius: 50%;
			cursor: pointer;
			display: block;
			height: 10px;
			font-size: 0;
			line-height: 0;
			margin: 0;
			padding: 0;
			transition-duration: .3s;
			width: 10px;
}


</style>