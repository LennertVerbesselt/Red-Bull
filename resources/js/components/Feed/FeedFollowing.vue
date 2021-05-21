<template>
    <div class="button">
    <button :class="[isFollowing ? 'clicked' : 'fill']" @click="changeFollowStatus" >{{isFollowing ? 'Following' : 'Follow'}}</button>
    </div>
</template>

<script>
export default {
    name: 'FeedFollowing',
    props: {
        Following: Boolean,
        PostUserID: Number,
    },
    data:function() {
        return {
            isFollowing: false,
        }
    },
    methods: {
        changeFollowStatus(){
            if(this.isFollowing){
                axios.post('api/unfollow', {postuserid: this.PostUserID}).then(response => {
				this.isFollowing = !this.isFollowing;
            }).catch(error => {
                console.log("Error, Unfollow failed");
            });
            } else {
                axios.post('api/follow', {postuserid: this.PostUserID}).then(response => {
                    this.isFollowing = !this.isFollowing;
                }).catch(error => {
                    console.log("Error, Follow failed");
                });
            }
        }
    },
    created() {
        this.isFollowing = this.Following;
    }
}
</script>

<style scoped>
.button {
    padding-top: 12.5px;
    margin-right: 20px;
}

.fill {
    background-color: #EB5876;
    color: white;
    border-radius: 4px;
    border: none;
    font-size: 12px;
    font-family: "Akzidenz Bold";
    text-align: center;
    left: 50%;
    top:50%;
    padding-top: 2px;

    height: 25px;
    width: 75px;

}
.clicked {
    background-color: transparent;
    border: 1px solid rgba(255, 255, 255, .85);
    border-radius: 4px;
    color: rgba(255, 255, 255, .75);

    font-size: 12px;
    font-family: "Akzidenz Regular";
    text-align: center;
    left: 50%;
    top:50%;

    height: 25px;
    width: 75px;
    
}
</style>