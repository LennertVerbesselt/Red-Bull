<template>
<div class="UploadButton">
    <router-link :to="{ name: 'Upload'}">
        <svg class="svg-circleplus" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="50" fill="#EB5876" stroke-width="0" ></circle>
                <line x1="32.5" y1="50" x2="67.5" y2="50" stroke-width="5"></line>
                <line x1="50" y1="32.5" x2="50" y2="67.5" stroke-width="5"></line>
            
        </svg>
    </router-link>
</div>
    
</template>

<script>
export default {
    name: 'UploadIcon',
    data:function() {
        return {
            upload: false,
        }
    }
}
</script>

<style scoped>

.svg-circleplus{
    position: fixed;
    right: 8%;
    bottom: 8%;
    width: 40px;
    height: 40px;

    box-shadow:0px 0px 30px #EB5876;
    border-radius:100%;
}

.svg-circleplus circle  { 
    position: fixed;
    right: 8%;
    bottom: 8%;
    width: 40px;
    height: 40px;
    
    z-index: 5; 

    
}

.svg-circleplus line {
    z-index: 5; 
    stroke: white; 
}

</style>