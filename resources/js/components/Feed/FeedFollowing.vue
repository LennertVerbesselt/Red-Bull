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
    padding-top: 18px;
}
    .fill {
        background-color: #EB5876;
        color: white;
        border-radius: 4px;
        border: none;
    }
    .clicked {
        background-color: transparent;
        border: 2px solid #EB5876;
        border-radius: 4px;
        color: white;
    }
</style>