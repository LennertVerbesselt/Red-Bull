<template>
<div class="illustration">
    <img class="header-illustration" src="../../assets/Final_Illustration_test1.png" alt="">
  </div>
    <div class="login">
 
    <form @submit.prevent="login">
        <div class="form-group">
            <input type="email" v-model="fields.email" class="" placeholder="Email">
            <input type="password" v-model="fields.password" class="" placeholder="Password">
        </div>
        <div class="loginSection">
           <form-button type="primary submit">Login</form-button>
           <router-link to="/register"><form-button type="secondary">Register</form-button></router-link>
        </div>
        <h4 class="text-center">or use one of the following methods:</h4>
        <div class="mediaSection">
            <form-button type="media"> <img class="mediaIconG" src="../../assets/google.svg" alt=""> Google</form-button>
            <form-button type="media"><img class="mediaIconF" src="../../assets/facebook.svg" alt="">Facebook</form-button> 
        </div>
        <div class="passwordForgot">
        <a class="pwdF" href="http://"> Forgot Password?</a>
        </div>
    </form>
    </div>
</template>


<script>
import FormButton from './FormButton.vue'
export default {
    name: 'Login',
    components: {
        FormButton
    },
    data: function () {
        return {
            fields: {
                email:"",
                password:""
            }
        }
    },
    methods: {
        login(){
            axios.post('api/login', this.fields).then(response => {
                this.fields={};
                console.log("login succesfull");
                this.$router.push('/');
                
            }).catch(error => {
                console.log("Error, Login not succesfull");
            });
        }
    }
    
}
</script>

<style scoped>
.login {

  margin-top: 10px;

}
.form-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 0.5rem;
}
.loginSection {
    display: flex;
    flex-direction: row;
   align-items: center;
   justify-content: center;
}
input {
    height: 35px;
    border-radius: 6px;
    width: 286px;
    
    margin: 0.5rem;
    text-align: center;

}
h4 {
    color: white;
    text-align: center;
}

.mediaIconG {
    position:absolute;
    height: 20px;
    margin-left:-40px;
    margin-top: -2px;
    

}
.mediaIconF {
    position: absolute;
    height: 20px;
    margin-left:-33px;
    margin-top: -4px;
    
}

.mediaSection{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.passwordForgot {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.pwdF {

    color: #EB5876;
    bottom: 50px;
    margin-top: 3rem;
}

.header-illustration {
    width: 100%;
    margin-top: 5%;
}

</style>