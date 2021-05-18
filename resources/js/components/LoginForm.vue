<template>
    <div class="login">
 <div class="illustration">
    Illustration goes here
  </div>
    <form method="" action="">
        <div class="form-group">
            <input type="email" v-model="fields.email" class="" placeholder="Email">
            <input type="password" v-model="fields.password" class="" placeholder="Password">
        </div>
        <div class="loginSection">
           <router-link to="/home"><form-button type="primary" @click="login()">Login</form-button></router-link>
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
            }).catch(error => {
                console.log("Error, Login not succesfull");
            });
        }
    }
    
}
</script>

<style scoped>
.login {

  margin-top: 60px;

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

.illustration {
  color: white;
  height: 200px;
  width: 268px;
  border:2px solid white;
  justify-content: center;
  margin:auto;
  margin-top: 10px;
}

</style>