<template>
    <FeedNavigation @change="changePage"></FeedNavigation>
	<transition name="featured" mode="out-in">
		<div v-if="featured">
			<div :key="featuredpost" v-for="featuredpost in FeaturedPosts">
				<PostItem :Post="featuredpost"></PostItem>
			</div>
		</div>
	
		<div v-else>
			<div :key="followingpost" v-for="followingpost in FollowingPosts">
				<PostItem :Post="followingpost"></PostItem>
			</div>
		</div>
	</transition>

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
			following: false,
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
			this.following = !this.following;
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
		this.getFollowingPosts();
	}
}
</script>

<style scoped>


.featured-enter-active,  .featured-leave-active{
	transition: all 0.3s ease-out;
}

.featured-enter-from {
	transform: translateX(100%);
	opacity:0;
}

.featured-leave-to {
	transform: translateX(-100%);
	opacity:0;
}

</style>