<template>

        <router-view></router-view>
</template>

<script>

export default {
  name: 'App',
  components: {
    
  
    
  }
}
</script>

<style >
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background:#121426 ;
  
}
body {
  background:#121426 ;
  margin: 0;
  padding: 0;
}
.agile__dots button {
    background-color: transparent;
			border: 1px solid #fff;
			border-radius: 100%;
			cursor: pointer;
			display: block;
			height: 10px;
			font-size: 0;
			line-height: 0;
			margin: 0;
			padding: 0;
			transition-duration: .3s;
			width: 10px;
}
.agile__dot {
    margin: 0 10px;
}
.agile__dots {
  bottom: 10px;
		left: 50%;
		position: absolute;
		transform: translateX(-50%);
}
.agile__dot--current {
  background-color: #fff;
  border-radius: 100%;
}
</style>
