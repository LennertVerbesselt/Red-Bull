<template>
    <div class="profile-container">
        <div class="profile-person">
            <ProfileImage></ProfileImage>
            <ProfileName></ProfileName>
        </div>
        <div class="follow">
            <FollowButton></FollowButton>
        </div>
    </div>
</template>

<script>

import ProfileImage from './ProfileImage'
import ProfileName from './ProfileName'
import FollowButton from './FeedFollowing'

export default {
    components: {
        ProfileImage,
        ProfileName,
        FollowButton,
    }

}
</script>

<style scoped>
.profile-container {
    margin-left: 20px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    height: 50px;
    
}

.profile-person {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
</style>