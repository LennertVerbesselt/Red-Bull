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

	<div class="loading" v-if="loading"><div class="bg"><div class="scaling-squares-spinner" :style="spinnerStyle">
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
</div></div></div>

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
			loading: false,
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
			this.loading = true;
			axios.get('api/getfeaturedposts').then(response => {
				this.FeaturedPosts = response.data.featuredposts;
				console.log(this.FeaturedPosts);
				this.loading =false;
            }).catch(error => {
                console.log("Error");
				this.loading =false;
            });
		},

		getFollowingPosts(){
			this.loading =true;
			axios.get('api/getfollowingposts').then(response => {
				this.FollowingPosts = response.data.followingposts;
				console.log(this.FollowingPosts);
				this.loading =false;
            }).catch(error => {
                console.log("Error");
				this.loading =false;
            });
		},
	},
	created(){
		this.getFeaturedPosts();
	}
}
</script>

<style scoped>


.featured-enter-active,  .featured-leave-active{
	transition: all 0.3s ease-out;
}

.featured-enter-from {
	
	opacity:0;
}

.featured-leave-to {
	
	opacity:0;
}

</style>