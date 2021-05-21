<template>

    <div class="post-description">
            <div class="username">{{User.name}}</div> 
            <div class="caption">{{Caption}}</div>
            <div class="comments">View all 35 comments</div>
    </div>
    
    
</template>

<script>
export default {
    name: 'FeedDescription',
    props: {
        User: Object,
        Caption: String,
    }

}
</script>

<style scoped>
.post-description {
    margin-top: 5px;
    margin-bottom: 280px;
    display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
    text-align: justify;
    position: absolute;
    left: 12px;
    line-height: 15px;
}
 body {
     color: white;
 }

 .username {
     color: white;
     font-family: "Akzidenz Bold Extended";
     font-size: 12px;
     display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
 }

 .caption {
     color: white;
     font-family: "Akzidenz Regular";
     font-size: 12px;
     display: inline-block;
    clear: both;
    overflow: hidden;
    white-space: nowrap;
    margin-left: 4px;
 }

 .comments {
    font-family: "Akzidenz Regular";
    font-size: 12px;
    clear: both;
    overflow: hidden;

    text-align: left;
    padding-bottom: 20%;
 }
</style>