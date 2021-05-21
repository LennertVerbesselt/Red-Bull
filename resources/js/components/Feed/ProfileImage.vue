<template>
        
       
             <img class="profile rounded-full" width="25" height="25" :src="Url" alt="" />
        
        
        
</template>

<script>
export default {
    name: 'ProfileImage',
    props: {
        Url: String,
    }
}
</script>

<style scoped>
.profile {
    margin-right:10px;
    margin-top: 12.5px;
    border-radius: 50%;
}
</style>