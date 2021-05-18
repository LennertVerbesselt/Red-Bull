<template>
    <Carousel class="carousel"></Carousel>
	<FeedPost></FeedPost>
   <BottomMenu> </BottomMenu>

</template>

<script>
import Carousel from '../components/Carousel'
import BottomMenu from '../components/BottomMenu'
import FeedPost from '../components/Feed/FeedPost'
export default {
	name: 'Home', 
    components: {
        BottomMenu,
        Carousel,
		FeedPost
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
.carousel {
    position: relative;
    top: 0;
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