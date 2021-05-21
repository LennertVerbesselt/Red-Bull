<template>
  <div class="buttons">
      <div class="vote">
          <button @click="upvote">
              <img v-if="!upvoted" src="../../../assets/upvote.png" alt="">
              <img v-if="upvoted" src="../../../assets/upvote-active.png" alt="">
          <div class="upvotes">
              {{up}}
          </div>
          </button>
          <button @click="downvote">
              <img v-if="!downvoted" src="../../../assets/downvote.png" alt="">
              <img v-if="downvoted" src="../../../assets/downvote-active.png" alt="">
          <div class="downvotes">
              {{down}}
          </div>
          </button>
      </div>
      <div class="comment">
          <button><img src="../../../assets/comment.png" alt=""></button>
      </div>
  </div>
</template>

<script>
export default {
    name: 'FeedButtons',
    props: {
        PostID: Number,
        Upvotes: Number,
        Downvotes: Number,
        Upvoted: Boolean,
        Downvoted: Boolean,
    },
    data:function() {
        return {
            up: 0,
            down: 0,
            upvoted: false,
            downvoted: false,
        }
    },
    methods: {

        getVotes(){
            axios.post('api/getvotes', {postid: this.PostID}).then(response => {
                this.up = response.data.upvotes;
                this.down = response.data.downvotes;
            }).catch(error => {
                console.log("Error, get upvotes failed");
            });
        },

        upvote(){
            axios.post('api/upvote', {postid: this.PostID}).then(response => {
                if(response.data.upvote != null) {
                    this.upvoted = true;
                    this.downvoted = false;
                } else if(response.data.removedupvote != null) {
                    this.upvoted = false;
                    this.downvoted = false;
                }
                this.getVotes();
            }).catch(error => {
                console.log("Error, Upvote failed");
            });
        },
        downvote(){
            axios.post('api/downvote', {postid: this.PostID}).then(response => {
				if(response.data.downvote != null) {
                    this.upvoted = false;
                    this.downvoted = true;
                } else if(response.data.removeddownvote != null) {
                    this.upvoted = false;
                    this.downvoted = false;
                }
                
                this.getVotes();
            }).catch(error => {
                console.log("Error, Upvote failed");
            });
        }
    },
    created() {
        this.up = this.Upvotes;
        this.down = this.Downvotes;
        this.upvoted = this.Upvoted;
        this.downvoted = this.Downvoted;
    }

}
</script>

<style scoped>
    
.buttons {
    display: flex;
    justify-content:space-between;
    padding: 0;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 20px;
}
.vote {
    left:0;
}
.comment {
    right: 0;
}
button {
    background-color: transparent;
    border: none;
}

img {
    width: 20px;
    padding: 0;
    margin: 0;
    }

.upvotes, .downvotes {
    font-family: "Akzidenz Bold Extended Italic";
    font-size: 8px;
    color:white;
    opacity: 0.25;
    text-align: center;
}
</style>