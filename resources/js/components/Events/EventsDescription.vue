<template>
    <div class="popup">
        <div class="inner">
            <div class="banner">
                <img class="eventHeader" :src="Post.headerurl" alt="">
                <img src="./../../../assets/gradient.png" class="gradient-description" alt="">
            </div>
            <h1 class="eventTittle">{{Post.name}}</h1>
            <h3 class="eventDate">{{getDatefromDatetime(Post.datetime)}}</h3>
            <body class="eventDescription">
                {{Post.description}}
            </body>
            <div class="prizeInfo">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
  <g id="Group_27" data-name="Group 27" transform="translate(-32 -392)">
    <rect id="Rectangle_170" data-name="Rectangle 170" width="8" height="29" transform="translate(43 392)" fill="#fff"/>
    <rect id="Rectangle_171" data-name="Rectangle 171" width="8" height="29" transform="translate(61 403) rotate(90)" fill="#fff"/>
  </g>
</svg>
            <h3>One step closer to win prizes!</h3>
            </div>
            <button class="buyButton">Buy Here</button>
        </div>
    </div>
</template>

<script>
export default {
props: {
        Post: Object,
    },
    methods: {
        getDatefromDatetime(datetime){
            var phpdate = String(datetime);
            var date = phpdate.substring(0,10);
            return date;
        },
        
    }
}
</script>

<style scoped>
.popup {
    color: white;
}
.inner {
position: relative;
height: 500px;
}
.eventHeader {
    width: 375px;
}
.prizeInfo {
    display: flex;
    justify-content: center;
    position: relative;
   
}
.prizeInfo svg{
   padding-top: 12px;
   padding-right:25px;
}
.eventDescription {
    position: relative;
    top: -100px;
    
}
.buyButton{
    border: none;
    color: white;
    background-color: #EB5876;
    width: 91px;
    height: 36px;
    border-radius: 6px;
    font-weight: bold;
    position: relative;
   
}
.gradient-description {
    width: 100%;
    position: relative;
    top: -200px;

}
.eventDate {
    position: relative;
    top: -120px;
}
.eventTittle {
    position: relative;
    top: -100px;
}
.banner {
    height: 260px;
    overflow: hidden;
}
.eventHeader {

    width: 500px;
    margin: 0;
    padding: 0;
}
</style>