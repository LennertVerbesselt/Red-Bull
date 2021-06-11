<template>
<div class="title">
    Your First Challenge!
</div>
<div class="sub-title">
    Let's start off easy. To complete this challenge, you must complete your profile. Fill in your first name, last name, and upload a profile picture to claim your first points!
</div>

<form  @submit.prevent="">
        <div class="form-group">
            <input type="firstname"  class="input-field" placeholder="First Name" v-model="fields.first_name">
            <input type="lastname"  class="input-field" placeholder="Last Name" v-model="fields.last_name">
        </div>
        <div class="submit">
           <form-button class="button" type="primary submit">Complete Challenge</form-button>
        </div>
          
    </form>

<div class="illustration">
    <img class="header-illustration" src="../../assets/Final_Illustration_test1.png" alt="">
  </div>
  

</template>

<script>



export default {
	name: 'Profile', 
    components: {},
    data: function() {
        return {
            fields: [],
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
	created() {
		this.checkIfLoggedIn();
	},
  mounted() {
  }
}
</script>

<style scoped>

.title {
    width:80%;
    left: 10%;
    height: 50px;
    position: relative;
    font-family: "Akzidenz Bold";
    font-size: 23px;
    color:white;

    display: flex;
    justify-content: center;
    align-items: center;

    margin-top: 35px;

}

.sub-title {
    width: 80%;
    left: 10%;
    height: 70px;
    position: relative;

    font-family: "Akzidenz Light";
    font-size: 14px;
    color: white;
    opacity: .5;

    display: flex;
    justify-content: center;
    align-items: center;

    margin-top: 10px;
}

.form-group {
    width: 80%;
    left: 10%;
    position: relative;

    display: flex;
    justify-content: center;
    flex-flow: column;
    align-items: center;
}

.input-field {
    width: 100%;
    

}


.header-illustration {
    width: 100%;
    
}

</style>