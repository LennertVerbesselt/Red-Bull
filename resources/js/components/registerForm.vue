<template>
   <form method="" action="">
        <div class="form-group">
            <input type="email"  class="" placeholder="Email">
            <input type="username"  class="" placeholder="Username">
            <input type="password"  class="" placeholder="Password">
            <input type="password"  class="" placeholder="Confirm password">
        </div>
        <div class="loginSection">
           <form-button type="secondary">Register</form-button>
        </div>
        <h4 class="text-center">or use one of the following methods:</h4>
        <div class="mediaSection">
            <form-button type="media"> <img class="mediaIconG" src="../../assets/google.svg" alt=""> Google</form-button>
            <form-button type="media"><img class="mediaIconF" src="../../assets/facebook.svg" alt="">Facebook</form-button>
        </div>
          <router-view/>
    </form>
</template>
    
<script>
import FormButton from './formButton.vue'
export default {
    name:'Register',
    components: {
        FormButton
    },
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
</style>