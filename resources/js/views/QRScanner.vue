<template>
   
  <qr-stream class="pb"></qr-stream>

   <BottomMenu> </BottomMenu>

</template>

<script>

import BottomMenu from '../components/BottomMenu'

import QrCapture from '../components/QRComponents/QrCaptureModule.vue'
import QrStream from '../components/QRComponents/QrStreamModule.vue'
import QrDropzone from '../components/QRComponents/QrDropzoneModule.vue'



export default {
	name: 'QRScanner', 
    components: {
        BottomMenu,
        QrStream,
        QrCapture,
        QrDropzone,
        
    },
    
	methods: {
		checkIfLoggedIn() {
            axios.get('api/getsessiondata').then(response => {
            }).catch(error => {
                console.log("Error");
				this.$router.push('/login');
            });

        },
	},
	mounted() {
		this.checkIfLoggedIn();
	}
}
</script>

<style scoped>


</style>