<template>
    <div class="button">
    <button v-on:click="message = 'Following'">Follow</button>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.button {
    padding-top: 18px;
}
    button {
        background-color: #EB5876;
        color: white;
        border-radius: 4px;
        border: none;
    }
</style>