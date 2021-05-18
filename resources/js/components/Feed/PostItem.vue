<template>
    <div class="post-container">

        <PostHeader></PostHeader>

        <div class="feed-content">
            <FeedContent></FeedContent>
        </div>
        <div class="feed-button">
            <FeedButtons></FeedButtons>
        </div>
        <div class="feed-description">
            <FeedDescription></FeedDescription>
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
    }

}
</script>

<style scoped>
.post-container {
  width: 100%;
  margin-top: 15px;
  margin-bottom: 15px;
  padding-bottom: 15px;
  border-style: solid;
  border-color: rgba(255, 255, 255, .25);
  border-width: 0px 0px 1px 0px;
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