<template>
    <div class="post-container">
        <div class="profile-container">
            <ProfileImage></ProfileImage>
            <ProfileName></ProfileName>
        </div>
        <div class="feed-content">
            <FeedContent></FeedContent>
        </div>
    </div>
</template>

<script>
import ProfileImage from './ProfileImage'
import ProfileName from './ProfileName'
import FeedContent from  './FeedContent'
export default {
    components: {
        ProfileImage,
        ProfileName,
        FeedContent
    }

}
</script>

<style scoped>
.post-container {
    margin: 10px;
}
    .profile-container {
        display: flex;
        flex-direction: row;
    }
</style>