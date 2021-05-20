<template>

    <div class="pagetitle">
        Post Submission
    </div>
    <div class="challenge">
        for the "{{Challenge.name}}" Challenge
    </div>
    <form  @submit.prevent="register">
        <div class="form-group">

            <img class="preview" v-if="!url" src="http://placehold.it/180" alt="your image" />
            <img class="preview" v-if="url" :src="url" />
            

            <div class="file-input">
                <input @change="onFileChange" type="file" id="file" class="file">
                <label for="file">Choose your image</label>
            </div>


            <textarea required rows="6" type="description"  class="caption" placeholder="Your caption" v-model="fields.description"/>
        </div>
        <div class="nav">
            <router-link to="/challenges"><form-button class="button" type="secondary">Back</form-button></router-link>
           <form-button class="button" type="primary submit">Post</form-button>
        </div>
        
          
    </form>

<BottomMenu> </BottomMenu>
</template>

<script>

import BottomMenu from '../components/BottomMenu'
import FormButton from '../components/FormButton.vue'


export default {
	name: 'Home', 
    components: {
        BottomMenu, 
        FormButton,
    },
    props: {
        id: String,
    },
    data () {
            return {
                ChallengeID: 0,
                Challenge: [],
                fields: {},
                url: null,
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
        getChallenge(){
            axios.post('api/getchallenge', {challengeid: this.ChallengeID}).then(response => {
                this.Challenge = response.data.challenge;
            }).catch(error => {
                console.log("Error");
            });

        },
        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
	},
	created() {
		this.checkIfLoggedIn();
        if(this.id){
            this.ChallengeID = this.id;
        }
        this.getChallenge();
	},
    mounted() {
        
    }
}
</script>

<style scoped>
.pagetitle {
    font-family: "Akzidenz Bold Extended";
    font-size: 26px;
    color:white;
    letter-spacing: 2px;

    margin-top: 10%;
}

.challenge {
    font-family: "Akzidenz Bold Extended";
    font-size: 14px;
    color:white;
    letter-spacing: 2px;
    margin-top: 2%;
}

.preview {
    margin-top: 5%;
    border-radius: 6px;
    width: 70%;
    left: 15%;
}

.caption {
    margin-top: 20px;
    width: 80%;
    left: 10%;
    color: #121426;

    font-family: "Akzidenz Regular";
    font-size: 14px;

    border-radius: 6px;
    outline: none;
    overflow: auto;
}

textarea {
    font-family: "Akzidenz Bold";
    font-size: 14px;
}

.nav {
    position: relative;
    width: 90%;
    left: 5%;
}

.button {
    margin-left: 15px;
    margin-right: 15px;
}

.file {
  opacity: 0;
  width: 0.1px;
  height: 0.1px;
  position: absolute;
}

.file-input label {
    font-family: "Akzidenz Bold Extended";
    color: #EB5876;
    border: 2px solid #EB5876 ;
    height: 100px;
    width: 135px;
    border-radius: 6px;
    font-weight: bold;
    margin-right: 10px;
    padding-top: 2%;
    padding-bottom: 2%;
    border:none;
}

.file-input {
    border: 2px solid #EB5876;
    border-radius: 6px;
    position: relative;
    width: 50%;
    left: 25%;
    padding-top: 2%;
    padding-bottom: 2%;
    margin-top: 5%;
}


</style>