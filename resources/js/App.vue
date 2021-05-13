<template>
<div class="illustration">
  Illustration goes here
</div>
  <Login/>
</template>

<script>
import Login from './components/loginForm.vue'
  

export default {
  name: 'App',
  components: {
    Login,
    
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  background:#121426 ;
  
}
body {
  background:#121426 ;
}
.illustration {
  color: white;
  height: 327px;
  border:2px solid white;
}
</style>
