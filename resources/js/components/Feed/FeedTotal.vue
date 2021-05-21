<template>
    <FeedNavigation></FeedNavigation>
	<div :key="featuredpost" v-for="featuredpost in FeaturedPosts">
		<PostItem :Post="featuredpost"></PostItem>
	</div>

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
	props: {
		
	},
	data:function() {
        return {
            FeaturedPosts: [],
        }
    },
	methods: {
		checkIfLoggedIn() {
            axios.get('api/getsessiondata').then(response => {
            }).catch(error => {
                console.log("Error");
				this.$router.push('/login');
            });
        },

		getFeaturedPosts(){
			axios.get('api/getfeaturedposts').then(response => {
				this.FeaturedPosts = response.data.featuredposts;
				console.log(this.FeaturedPosts)
            }).catch(error => {
                console.log("Error");
            });
		},
	},
	created(){
		this.getFeaturedPosts();
	}
}
</script>

<style scoped>



</style>