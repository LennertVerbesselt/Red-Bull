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
    components: {
        BottomMenu,
        Carousel,
		FeedPost
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