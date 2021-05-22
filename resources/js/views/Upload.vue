<template>

    <div class="pagetitle">
        Upload Post
    </div>
    <div v-if="fromChallenge" class="challenge">
        for the "{{Challenge.name}}" Challenge
    </div>
    <form  @submit.prevent="uploadPost" enctype="multipart/form-data">
        <div class="form-group">

            <div class="preview" v-if="!url">
                <div class="placeholder">
                    Your Image
                </div>
            </div>
            <img class="preview" v-if="url" :src="url" />
            
            <div class="inputs">
                <div class="file-input">
                    <input @change="onFileChange" type="file" id="file" class="file" ref="file" capture="camera">
                    <label for="file">Choose your image</label>
                </div>
                    
            </div>
            


            <textarea required rows="6" type="description"  class="caption" placeholder="Your caption" v-model="caption"/>
        </div>
        <div class="nav">
            <form-button @click="$router.go(-1)" class="button" type="secondary">Back</form-button>
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
                caption: "",
                url: null,
                file: '',
                fromChallenge: true,
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
            this.file = e.target.files[0];
            this.url = URL.createObjectURL(this.file);

              this.file = e.target.files[0];
        },

        uploadPost(e){
            e.preventDefault();
            let existingObj = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let data = new FormData();
            data.append('file', this.file);
            data.append('description', this.caption);
            data.append('challengeid', this.ChallengeID);
            data.append('url', this.url);
            console.log(data);
            axios.post('api/uploadpost', data).then(response => {
                this.$router.push('/');
            }).catch(error => {
                this.$router.push('/');
            });
        }
	},
	created() {
		this.checkIfLoggedIn();
        if(this.id){
            this.ChallengeID = this.id;
        } else {
            this.fromChallenge = false;
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
    max-height: 450px;
    left: 15%;
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    text-align: center;
    margin-left: auto;
    margin-right: auto;

    border: 2px solid #EB5876;
    border-radius: 6px;
}

.preview img {
    width: 100%;
    height: 100%;
}

.placeholder {
    font-family: "Akzidenz Bold Extended";
    font-size: 30px;
    color: white;
    opacity: 0.1;

    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    text-align: center;
    margin-left: auto;
    margin-right: auto;

    width: 100%;
    height: 300px;
    

    
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

.inputs {
    display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  text-align: center;
}


</style>