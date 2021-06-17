<template>
    <div class="application">

        <router-view >
        </router-view>

        
        
      
    </div>
</template>

<script>


export default {
  name: 'App',
  components: {
    
  
    
  },
  data:function() {
    return {
    }
  }
}
</script>

<style >
@font-face {
  font-family: "Akzidenz Light";
  src: url(../fonts/Berthold Akzidenz Grotesk Light.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Regular";
  src: url(../fonts/Berthold Akzidenz Grotesk Regular.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Bold";
  src: url(../fonts/Berthold Akzidenz Grotesk Bold.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Bold Condensed";
  src: url(../fonts/Berthold Akzidenz Grotesk Bold Condensed.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Bold Extended";
  src: url(../fonts/Berthold Akzidenz Grotesk Bold Extended.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Bold Extended Italic";
  src: url(../fonts/Berthold Akzidenz Grotesk Bold Extended Italic.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Light";
  src: url(../fonts/Berthold Akzidenz Grotesk Light.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Medium";
  src: url(../fonts/Berthold Akzidenz Grotesk Medium.otf)format("opentype");
}

@font-face {
  font-family: "Akzidenz Medium Condensed";
  src: url(../fonts/Berthold Akzidenz Grotesk Medium Condensed.otf)format("opentype");
}

@font-face {
  font-family: "Font Awesome 5 Free";
  src: url(../fonts/Font Awesome 5 Free-Solid-900.otf)format("opentype");
}



#app {
  font-family: "Akzidenz Regular", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background:#121426 ;
  max-width: 400px;
  
  
}

.application {
  max-width: 400px;
  position: absolute;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  text-align: center;
}

body {
  background:#121426 ;
  margin: 0;
  padding: 0;
  max-width: 400px;
  /*overflow-y: hidden; /* Hide vertical scrollbar */
  /*overflow-x: hidden; /* Hide horizontal scrollbar */
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
  bottom: -10px;
		left: 50%;
		position: absolute;
		transform: translateX(-50%);
}
.agile__dot--current {
  background-color: #fff;
  border-radius: 100%;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}


.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.loading {
  position: absolute;
  top: 0;
  left: 0;

  width: 100%;
  height: 100%;

  color: rgba(16,20,38, 0.5);

}

.bg{
  position: relative;
  width: 100%;
  height: 100%;
  background-color: rgba(16,20,38, 0.8);
  z-index: 8;

  display: flex;
  flex-flow: column;
  justify-content: center;
  align-items: center;
}

.scaling-squares-spinner, .scaling-squares-spinner * {
      box-sizing: border-box;
    }

    .scaling-squares-spinner {
      height: 65px;
      width: 65px;
      position: relative;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      animation: scaling-squares-animation 1250ms;
      animation-iteration-count: infinite;
      transform: rotate(0deg);
    }

    .scaling-squares-spinner .square {
      height: calc(65px * 0.25 / 1.3);
      width: calc(65px * 0.25 / 1.3);
      margin-right: auto;
      margin-left: auto;
      border: calc(65px * 0.04 / 1.3) solid #EB5876;
      position: absolute;
      animation-duration: 1250ms;
      animation-iteration-count: infinite;
    }

    .scaling-squares-spinner .square:nth-child(1) {
      animation-name: scaling-squares-spinner-animation-child-1;
    }

    .scaling-squares-spinner .square:nth-child(2) {
      animation-name: scaling-squares-spinner-animation-child-2;
    }

    .scaling-squares-spinner .square:nth-child(3) {
      animation-name: scaling-squares-spinner-animation-child-3;
    }

    .scaling-squares-spinner .square:nth-child(4) {
      animation-name: scaling-squares-spinner-animation-child-4;
    }


    @keyframes scaling-squares-animation {

      50% {
        transform: rotate(90deg);
      }

      100% {
        transform: rotate(180deg);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-1 {
      50% {
        transform: translate(150%,150%) scale(2,2);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-2 {
      50% {
        transform: translate(-150%,150%) scale(2,2);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-3 {
      50% {
        transform: translate(-150%,-150%) scale(2,2);
      }
    }

    @keyframes scaling-squares-spinner-animation-child-4 {
      50% {
        transform: translate(150%,-150%) scale(2,2);
      }
    }


</style>
