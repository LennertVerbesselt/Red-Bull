<template>
  <h3>{{User.name}}</h3>
</template>

<script>
export default {
  name: 'ProfileName',
  props: {
    User: Object,
  },
}
</script>

<style scoped>
  h3 {
    color: white;
    font-size: 12px;
    font-family: "Akzidenz Bold Extended";

    margin-left: 0px;
    margin-top: 18px;
  }
</style>