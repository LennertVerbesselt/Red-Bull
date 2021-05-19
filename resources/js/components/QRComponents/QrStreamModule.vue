<template>
   <div>
    <h1 class="pagetitle">Looking for QR Code</h1>


    <qr-stream class="QRScanner" :camera="camera" @decode="onDecode" @init="onInit">
      
      <div v-if="validationSuccess" class="validation-success">
        This is a URL
      </div>

      <div v-if="validationFailure" class="validation-failure">
        This is NOT a URL!
      </div>

      <div v-if="validationPending" class="validation-pending">
        Long validation in progress...
      </div>
    </qr-stream>
    <p class="decode-result">Last result: <b>{{ result }}</b></p>
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
      await this.timeout(1000)
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
  max-height: 500px;
  max-width: 500px;
  margin: auto;
}
.frame {
  border-style: solid;
  border-width: 2px;
  border-color: red;
  height: 200px;
  width: 200px;
  position: absolute;
  top: 0px;
  bottom: 0px;
  right: 0px;
  left: 0px;
  margin: auto;
}

.QRScanner {
  width:80%;
  height: 300px;
  left: 10%;
  border: 5px solid white;
  border-radius: 5px; 
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;  
  z-index: 2;
}


.validation-success,
.validation-failure,
.validation-pending {
  position: absolute;
  width: 100%;
  background-color: rgba(255, 255, 255, .8);
  text-align: center;
  font-weight: bold;
  font-size: 1.4rem;
  padding: 10px;

  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  width:80%;
  height: 300px;
  left: 10%;
  border: 2px solid white;
  border-radius: 15px;
}
.validation-success {
  color: green;
}
.validation-failure {
  color: red;
}

.pagetitle {
  font-family: "Akzidenz Bold Extended";
  color:white;
  font-size: 22px;
  letter-spacing: 1px;
}

</style>