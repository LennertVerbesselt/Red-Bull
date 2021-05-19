<template>
	<PostItem></PostItem>
	<PostItem></PostItem>

</template>

<script>


import FeedPost from './FeedPost'
import PostItem from './PostItem'
import FeedNavigation from './FeedNavigation'


export default {
	name: 'FeedTotal', 
    components: {
		FeedPost,
		PostItem,
		FeedNavigation,
    },
	methods: {
		/*checkIfLoggedIn() {
            axios.get('api/getsessiondata').then(response => {
            }).catch(error => {
                console.log("Error");
				this.$router.push('/login');
            });
        }*/
	},
}
</script>

<style scoped>



</style>