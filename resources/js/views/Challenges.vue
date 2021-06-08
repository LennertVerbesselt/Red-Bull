<template>
    
    <challenges-total></challenges-total>
   <BottomMenu> </BottomMenu>

</template>

<script>

import BottomMenu from '../components/BottomMenu'

import ChallengesTotal from '../components/Challenges/ChallengesTotal.vue'




export default {
	name: 'Challenges', 
    components: {
        BottomMenu,
        
        ChallengesTotal
        
    },
	methods: {
        checkIfLoggedIn() {
            axios.get('api/getsessiondata').then(response => {
            }).catch(error => {
                console.log("Error");
				this.$router.push('/login');
            });
        }
	},
	created() {
		this.checkIfLoggedIn();
	}
}
</script>

<style scoped>


</style>