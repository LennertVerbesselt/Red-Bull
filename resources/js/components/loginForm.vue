<template>
    <form action="">
        <div class="form-group">
            <input type="email" v-model="item.email" class="" placeholder="Email">
            <input type="password" v-model="item.password" class="" placeholder="Password">
        </div>
        <div class="loginSection">
           <form-button type="primary" @click="login()">Login</form-button>
           <form-button type="secondary">Register</form-button>
        </div>
        <h4 class="text-center">or use one of the following methods:</h4>
        <div class="mediaSection">
            <form-button type="media"> <img class="mediaIconG" src="../../assets/google.svg" alt=""> Google</form-button>
            <form-button type="media"><img class="mediaIconF" src="../../assets/facebook.svg" alt="">Facebook</form-button>
        </div>
        <div class="passwordForgot">
        <a href="http://"> Forgot Password?</a>
        </div>
    </form>
</template>


<script>
import FormButton from './formButton.vue'
export default {
    name: 'Login',
    components: {
        FormButton
    },
    data: function () {
        return {
            item: {
                email:"",
                password:""
            }
        }
    },
    methods: {
        login(){
            if (this.item.email && this.item.password == '') {
                return;
            }
        }
    }
    
}
</script>

<style scoped>
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
a {

    color: #EB5876;
    bottom: 50px;
    margin-top: 3rem;
}

</style>