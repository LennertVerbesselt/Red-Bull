<template>
    <challenges-navigation></challenges-navigation>
    <challenges-total></challenges-total>
   <BottomMenu> </BottomMenu>

</template>

<script>

import BottomMenu from '../components/BottomMenu'
import ChallengesNavigation from '../components/Challenges/ChallengeNavigation.vue'
import ChallengesTotal from '../components/Challenges/ChallengesTotal.vue'




export default {
	name: 'Home', 
    components: {
        BottomMenu,
        ChallengesNavigation,
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
		//this.checkIfLoggedIn();
	}
}
</script>

<style scoped>


</style>