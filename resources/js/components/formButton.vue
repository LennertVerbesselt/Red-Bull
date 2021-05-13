<template>
    <button :class="type" :disabled="disabled"> <slot></slot> </button>
</template>

<script>
    export default {
        name: 'FormButton',

        props: {
            type : String,
            disabled: Boolean,
        }
    }
</script>

<style scoped>
button {
    margin-top: 10px;
}
.secondary {
    border:2px solid #FFF07C;
    border-radius: 2px ;
    color:#FFF07C ;
    height: 38px;
    width: 135px;
    border-radius: 6px;
    font-weight: bold;
    background: none;
    margin-left: 10px;
    
    }
    .primary {
    color: white;
    background-color:#EB5876 ;
    height: 38px;
    width: 135px;
    border-radius: 6px;
    font-weight: bold;
    margin-right: 10px;
    border:none;
    }
    .media {
    height: 40px;
    border-radius: 6px;
    width: 286px;
    background-color: white;
    font-weight: bold;
    text-align: center;
    
    }

</style>