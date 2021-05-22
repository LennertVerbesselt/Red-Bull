<template>
   
  <qr-stream :ChallengeID="ChallengeID" class="pb"></qr-stream>

   <BottomMenu> </BottomMenu>

</template>

<script>

import BottomMenu from '../BottomMenu'

import QrCapture from '../QRComponents/QrCaptureModule.vue'
import QrStream from '../QRComponents/QrStreamModule.vue'
import QrDropzone from '../QRComponents/QrDropzoneModule.vue'




export default {
	name: 'QRScanner', 
    components: {
        BottomMenu,
        QrStream,
        QrCapture,
        QrDropzone,
        
    },
    props: {
        id: Number,
    },
    data:function() {
        return {
            ChallengeID: 0,
        }
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
    created(){
        if(this.id){
            this.ChallengeID = this.id;
        }
    },
	mounted() {
		this.checkIfLoggedIn();
	}
}
</script>

<style scoped>


</style>