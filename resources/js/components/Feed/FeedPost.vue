<template>
    <div class="post-container">
        <div class="profile-container">
                <div class="profile-person">
                    <ProfileImage></ProfileImage>
                    <ProfileName></ProfileName>
                </div>
                <div class="follow">
                    <feed-following></feed-following>
                </div>
        </div>
        <div class="feed-content">
            <FeedContent></FeedContent>
        </div>
        <div class="feed-description">
            <FeedDescription></FeedDescription>
        </div>
        <div class="feed-button">
            <FeedButtons></FeedButtons>
        </div>
        
    </div>
</template>

<script>
import ProfileImage from './ProfileImage'
import ProfileName from './ProfileName'
import FeedContent from  './FeedContent'
import FeedDescription from './FeedDescription'
import FeedButtons from './FeedButtons'
import FeedFollowing from './FeedFollowing.vue'
export default {
    components: {
        ProfileImage,
        ProfileName,
        FeedContent,
        FeedDescription,
        FeedButtons,
        FeedFollowing
    }

}
</script>

        FeedFollowing
<style scoped>
.post-container {
    margin: 10px;
}
    .profile-container {
        display: flex;
   flex-direction: row;
   justify-content: space-between;
    }
    .profile-person {
        display: flex;
        flex-direction: row;
    }
</style>