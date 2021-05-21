<template>
    <FeedNavigation @change="changePage"></FeedNavigation>
	<div v-if="featured">
		<div :key="featuredpost" v-for="featuredpost in FeaturedPosts">
			<PostItem :Post="featuredpost"></PostItem>
		</div>
	</div>
	<div v-if="!featured">
		<div :key="followingpost" v-for="followingpost in FollowingPosts">
			<PostItem :Post="followingpost"></PostItem>
		</div>
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
			FollowingPosts: [],
			featured: true,
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

		changePage(){
			this.featured = !this.featured;
			if(this.featured){
				this.getFeaturedPosts();
			} else {
				this.getFollowingPosts();
			}
		},

		getFeaturedPosts(){
			axios.get('api/getfeaturedposts').then(response => {
				this.FeaturedPosts = response.data.featuredposts;
				console.log(this.FeaturedPosts)
            }).catch(error => {
                console.log("Error");
            });
		},

		getFollowingPosts(){
			axios.get('api/getfollowingposts').then(response => {
				this.FollowingPosts = response.data.followingposts;
				console.log(this.FollowingPosts)
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