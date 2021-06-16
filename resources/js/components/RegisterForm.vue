<template>
    <div class="register">
<div class="illustration">
<img class="header-illustration" src="../../assets/Final_Illustration_test1.png" alt="">
</div>

<div class="errors" v-if="showErrors">
        <div v-if="errors.email" class="error-message">{{errors.email[0]}}</div>
        <div v-if="errors.password" class="error-message">{{errors.password[0]}}</div>
        <div class="error-message">Please try again.</div>
    </div>

   <form  @submit.prevent="register">
        <div class="form-group">
            <input type="email"  class="" placeholder="Email" v-model="fields.email">
            <input type="username"  class="" placeholder="Username" v-model="fields.name">
            <input type="password"  class="" placeholder="Password" v-model="fields.password">
            <input type="password"  class="" placeholder="Confirm password" v-model="fields.password_confirmation">
        </div>
        <div class="loginSection">
           <router-link to="/login"><form-button class="button" type="secondary">Back</form-button></router-link>
           <form-button class="button" type="primary submit">Register</form-button>
        </div>
        <h4 class="text-center">or use one of the following methods:</h4>
        <div class="mediaSection">
            <form-button type="media"> <img class="mediaIconG" src="../../assets/google.svg" alt=""> Google</form-button>
            <form-button type="media"><img class="mediaIconF" src="../../assets/facebook.svg" alt="">Facebook</form-button>
        </div>
          
    </form>
    </div>

    <div class="loading" v-if="loading"><div class="bg"><div class="scaling-squares-spinner" :style="spinnerStyle">
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
</div></div></div>
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
            errors: {},
            showErrors: false,
            loading:false,
        }
    },
    methods: {
        register() {
            this.loading = true;
            axios.post('api/register', this.fields).then(response => {
                this.fields={};
                this.loading = false;
                this.$router.push('/survey');
            }).catch(error => {
                this.showErrors = true;
                this.errors = error.response.data.errors;
                console.log(error.response.data.errors);
                this.loading = false;
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

.loginSection {
    position: relative;
    width: 90%;
    left: 5%;
}

.button {
    margin-left: 10px;
    margin-right: 10px;
}


.header-illustration {
    width: 350px;
}

.errors {
    width: 80%;
    position: relative;
    left: 10%;
    padding: 5px 0px;
    

    border: 2px solid #EB5876;
    background-color: #ffd3dc;

    border-radius: 6px;

    display: flex;
    flex-flow: column;
    justify-content: flex-start;
    align-items: center;
}

.error-message {
    font-family: "Akzidenz Regular";
    color: #EB5876;
    font-size: 16px;
    text-align: center;
    margin: 5px 10px;
}
</style>