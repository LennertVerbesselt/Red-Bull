<template>
   
   <BottomMenu> </BottomMenu>

</template>

<script>

import BottomMenu from '../components/BottomMenu'





export default {
	name: 'QRScanner', 
    components: {
        BottomMenu,
        
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