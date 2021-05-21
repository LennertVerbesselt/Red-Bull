<template>
   <div>
    <div class="titleBG">
      <h1 class="pagetitle">Looking for QR Code</h1>
    </div>

    <qr-stream class="QRScanner" :camera="camera" @decode="onDecode" @init="onInit">
      
      <div v-if="validationSuccess" class="validation-success">
        Succes
      </div>

      <div v-if="validationFailure" class="validation-failure">
        Failure
      </div>

      <div v-if="validationPending" class="validation-pending">
        Verifying QR Code
      </div>
    </qr-stream>
  </div>
</template>

<script lang="ts">

import { defineComponent, reactive, toRefs } from 'vue';
import { QrStream } from 'vue3-qr-reader'


export default defineComponent({
  name: 'QrStreamModule',
  components: {
    QrStream,
    
  },
  data () {
    return {
      isValid: undefined,
      camera: 'auto',
      result: null,
    }
  },
  computed: {
    validationPending () {
      return this.isValid === undefined
        && this.camera === 'off'
    },

    validationSuccess () {
      return this.isValid === true
    },

    validationFailure () {
      return this.isValid === false
    }
  },

  methods: {

    onInit (promise) {
      promise
        .catch(console.error)
        .then(this.resetValidationState)
    },

    resetValidationState () {
      this.isValid = undefined
    },

    async onDecode (content) {
      this.result = content
      this.turnCameraOff()

      // pretend it's taking really long
      await this.timeout(3000)
      this.isValid = content.startsWith('http')

      // some more delay, so users have time to read the message
      await this.timeout(2000)

      this.turnCameraOn()
    },

    turnCameraOn () {
      this.camera = 'auto'
    },

    turnCameraOff () {
      this.camera = 'off'
    },

    timeout (ms) {
      return new Promise(resolve => {
        window.setTimeout(resolve, ms)
      })
    }
  }

});
</script>

<style scoped>
.stream {
  height: 100vh;
  width: 100vw;
}
.frame {
  
  height: 100vh;
  width: 100vw;
  position: absolute;
  top: 0px;
  bottom: 0px;
  right: 0px;
  left: 0px;
  margin: auto;
}

.QRScanner {
  width:100vw;
  height: 100vh;
    
  z-index: 1;
}


.validation-success,
.validation-failure,
.validation-pending {
  position: absolute;
  width: 100%;
  background-color: rgba(18, 20, 38, 0.8);
  text-align: center;
  font-family: "Akzidenz Bold Extended";
  font-weight: bold;
  font-size: 30px;

  color: white;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  width:100%;
  height: 100%;
  z-index: 3;
}
.validation-success {
  color: #FFF07C;
}
.validation-failure {
  color: #EB5876;
}

.titleBG {
  width:100%;
  height: 300px;
  background: #252525;
	background: linear-gradient(180deg, rgba(18,20,38,1) 0%, rgba(18,20,38,0) 100%);
	top: 0px;
	left: 0;
	right: 0;
	bottom: 0;
  position: absolute;

  z-index: 2;
}


.pagetitle {
  position: absolute;
  font-family: "Akzidenz Bold Extended";
  color:white;
  font-size: 18px;
  letter-spacing: 1px;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  text-align: center;

  width:100%;
  height: 100%;
  top: -30%;
  
  z-index: 3;
}

</style>