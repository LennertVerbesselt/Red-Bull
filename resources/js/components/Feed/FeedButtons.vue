<template>
  <div class="buttons">
      <div class="vote">
          <button><img src="../../../assets/upvote.png" alt="">
          <div class="upvotes">
              {{Upvotes}}
          </div>
          </button>
          <button><img src="../../../assets/downvote.png" alt="">
          <div class="downvotes">
              {{Downvotes}}
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
        Upvotes: Number,
        Downvotes: Number,
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