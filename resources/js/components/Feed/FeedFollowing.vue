<template>
    <div class="button">
    <button :class="[isActive ? 'fill' : 'clicked']" @click="isActive = !isActive" >{{isActive ? 'Follow' : 'Following'}}</button>
    </div>
</template>

<script>
export default {
    data:function() {
        return {
            isActive: true
        }
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

    height: 25px;
    width: 75px;
    
}
</style>