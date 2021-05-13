<template>
    <form action="">
        <div class="form-group">
            <input type="email" v-model="item.email" class="" placeholder="Email">
            <input type="password" v-model="item.password" class="" placeholder="Password">
        </div>
        <div class="loginSection">
           <form-button type="primary" @click="isLoggedIn()">Login</form-button>
           <form-button type="secondary">Register</form-button>
        </div>
        <h4>or use one of the following methods:</h4>
        <div class="mediaSection">
            <form-button type="media"> <img class="mediaIconG" src="../../assets/google.svg" alt=""> Google</form-button>
            <form-button type="media"><img class="mediaIconF" src="../../assets/facebook.svg" alt="">Facebook</form-button>
        </div>
        <a href="http://"> Forgot Password?</a>
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
        isLoggedIn(){
            if (this.item.email && this.item.password == '') {
                console.log("nothing happened");
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
input {
    height: 35px;
    border-radius: 10px;
    width: 286px;
    
    margin: 0.5rem;
    text-align: center;

}
h4 {
    color: white;
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
a {
    position: absolute;
    color: #EB5876;
    bottom: 50px;
    left: 130px;
}

</style>