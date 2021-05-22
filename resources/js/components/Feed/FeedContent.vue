<template>
    <div class="feed-content">
        <img :src="PostImage.url" alt="">
    </div>
</template>

<script>
export default {
    name: 'FeedContent',
    props: {
        PostImage: Object,
    }
}
</script>

<style scoped>
    .feed-content{
        display: flex;
        justify-content: center;
        object-fit: cover;
    }
    .feed-content img {
        width: 100%;
        max-height: 500px;
    }
</style>