<template>
    <div class="popup">
        <div class="inner">
            <slot/>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.popup {
    color: white;
}
.inner {
    height: 500px;
}
</style>