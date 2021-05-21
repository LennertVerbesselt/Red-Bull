<template>
    <div class="profile-container">
        <div class="profile-person">
            <ProfileImage :Url="ProfilePicture.url"></ProfileImage>
            <ProfileName :User="User"></ProfileName>
        </div>
        <div class="follow">
            <FollowButton :Following="Following"></FollowButton>
        </div>
    </div>
</template>

<script>

import ProfileImage from './ProfileImage'
import ProfileName from './ProfileName'
import FollowButton from './FeedFollowing'

export default {
    name: 'PostHeader',
    components: {
        ProfileImage,
        ProfileName,
        FollowButton,
    },
    props: {
        ProfilePicture: Object,
        User: Object,
        Following: Boolean,
    }

}
</script>

<style scoped>
.profile-container {
    margin-left: 10px;
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