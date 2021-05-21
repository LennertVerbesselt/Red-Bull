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
        max-width: 100%;
    }
</style>