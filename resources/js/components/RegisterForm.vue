<template>
    <div class="register">
<div class="illustration">
<img class="header-illustration" src="../../assets/Final_Illustration_test1.png" alt="">
</div>

   <form  @submit.prevent="register">
        <div class="form-group">
            <input type="email"  class="" placeholder="Email" v-model="fields.email">
            <input type="username"  class="" placeholder="Username" v-model="fields.name">
            <input type="password"  class="" placeholder="Password" v-model="fields.password">
            <input type="password"  class="" placeholder="Confirm password" v-model="fields.password_confirmation">
        </div>
        <div class="loginSection">
           <form-button type="secondary submit">Register</form-button>
           <router-link to="/login"><a class="BTL">Back to Login</a></router-link>
        </div>
        <h4 class="text-center">or use one of the following methods:</h4>
        <div class="mediaSection">
            <form-button type="media"> <img class="mediaIconG" src="../../assets/google.svg" alt=""> Google</form-button>
            <form-button type="media"><img class="mediaIconF" src="../../assets/facebook.svg" alt="">Facebook</form-button>
        </div>
          
    </form>
    </div>
</template>
    
<script>
import FormButton from './FormButton.vue'
export default {
    name:'Register',
    components: {
        FormButton
    },
    data() {
        return{
            fields: {},
        }
    },
    methods: {
        register() {
            axios.post('api/register', this.fields).then(response => {
                this.fields={};
                this.$router.push('/');
            }).catch(error => {
                console.log("Error");
            });
        }
    }
    }

</script>

<style scoped>
.register {
    margin-top: 60px;
}

.loginSection {
    display: flex;
    flex-direction: row;
   align-items: center;
   justify-content: center;
}

.form-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 0.5rem;
}
input {
    height: 35px;
    border-radius: 6px;
    width: 286px;
    
    margin: 0.5rem;
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
h4 {
    color: white;
    text-align: center;
}

.BTL {

    color: #EB5876;
    bottom: 50px;
    margin-top: 1rem;
    padding-right: 1rem;
}


.header-illustration {
    width: 350px;
}
</style>