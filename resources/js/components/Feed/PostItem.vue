<template>
    <div class="post-container">

        <PostHeader :User="Post.user" :ProfilePicture="Post.profilepicture" :Following="Post.following"></PostHeader>

        <div class="feed-content">
            <FeedContent :PostImage="Post.postimage"></FeedContent>
        </div>
        <div class="feed-button">
            <FeedButtons :Upvoted="Post.upvoted" :Downvoted="Post.downvoted" :PostID="Post.post.id" :Upvotes="Post.post.upvotes" :Downvotes="Post.post.downvotes" ></FeedButtons>
        </div>
        <div class="feed-description">
            <FeedDescription :User="Post.user" :Caption="Post.post.description" ></FeedDescription>
        </div>
        
    </div>
    


    
</template>

<script>

import PostHeader from './PostHeader'
import FeedContent from  './FeedContent'
import FeedDescription from './FeedDescription'
import FeedButtons from './FeedButtons'
import FeedFollowing from './FeedFollowing.vue'

export default {
    components: {
        PostHeader,
        FeedContent,
        FeedDescription,
        FeedButtons,
        FeedFollowing
    },
    props: {
        Post: Object,
    },

}
</script>

<style scoped>
.post-container {
  width: 100%;
  margin-top: 15px;
  margin-bottom: 35px;
  padding-bottom: 15px;
  border-style: solid;
  border-color: rgba(255, 255, 255, .25);
  border-width: 0px 0px 0px 0px;
}
.profile-container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.profile-person {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}




</style>