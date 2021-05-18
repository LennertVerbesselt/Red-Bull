<template>
  <div class="buttons">
      <div class="vote">
          <button><img src="../../../assets/upvote.png" alt=""></button>
          <button><img src="../../../assets/downvote.png" alt=""></button>
      </div>
      <div class="comment">
          <button><img src="../../../assets/comment.png" alt=""></button>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    
    .buttons {
        display: flex;
        justify-content:space-between;
        padding: 0;
        margin-top: 10px;
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
        width: 30px;
        padding: 0;
        margin: 0;
    }
</style>