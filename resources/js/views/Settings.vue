<template>

<div class="SettingsHeader">
    <div class="back">
        <div class="back-text">
            <a @click="$router.go(-1)">Back</a>
        </div>
    </div>
    <div class="page-title">
        Settings
    </div>
</div>

<div class="segment-title"><span>Account Settings</span></div>
<div class="account-wrapper">
    
</div>
<div class="segment-title">Privacy Settings</div>
<div class="privacy-wrapper">
    
</div>
<div class="segment-title">GDPR Settings</div>
<div class="gdpr-wrapper">
    
    <div class="right">
        <div class="right-title">Right of acces:</div>
        <div class="button" @click="getAllData">
        <div class="button-text">GET YOUR DATA</div>
    </div>
    </div>

    <div class="right">
        <div class="right-title">Right of Correction:</div>
        <div class="button">
        <div class="button-text">SUBMIT A TICKET</div>
    </div>
    </div>

    <div class="right">
        <div class="right-title">Right to be Forgotten:</div>
        <div class="button">
        <div class="button-text">DELETE ACCOUNT</div>
    </div>
    </div>
</div>
<div class="apply-changes">

</div>

<BottomMenu></BottomMenu>
    
</template>

<script>

import BottomMenu from './../components/BottomMenu.vue'

export default {
    name: "Settings",
    components: {
        BottomMenu,
    },
    props: {

    },
    data:function() {
        return {

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

        getAllData() {
            axios.get('api/getalldata').then(response => {
                
                const blob = new Blob([response.data.textfile], { type: 'text' });
                
                const link = document.createElement('a');
                
                link.href = URL.createObjectURL(blob);
                
                link.download = "Your data";
                link.click();
                URL.revokeObjectURL(link.href);

            }).catch(error => {
                console.log("Errorrrr");
            });
        },

        deleteAllData() {

        }



    },
    created() {
        this.checkIfLoggedIn();

    },
    mounted() {

    }
}
</script>

<style scoped>

.SettingsHeader {
    width: 100%;
    height: 60px;
    position: relative;
    left: 0;

    display: flex;
    justify-content: center;
    align-items: center;

    border-bottom: 2px solid white;
}

.back-text {
    font-family: "Akzidenz Medium";
    font-size: 16px;
    color: white;
    position: absolute;
    top: 20px;
    left: 25px;
}

.page-title {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
    color: white;
}

.segment-title {
    font-family: "Akzidenz Bold Extended";
    font-size: 22px;
    color:white;

    margin-left: 10px;
    margin-top: 20px;
    
    display: flex;
    flex-flow: row;
    justify-content: flex-start;
    align-items: center;
}

.account-wrapper, .privacy-wrapper, .gdpr-wrapper {
    width: 100%;
    margin-top: 15px;
    position: relative;
    display: flex;
    flex-flow: column;
    justify-content: flex-start;
    align-items: center;
}

.right {
    position: relative;
    width: 94%;
    height: 30px;
    left: 0%;
    margin: 10px 0px;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.right-title {
    font-family: "Akzidenz Medium";
    font-size: 16px;
    color:white;
    text-align: right;
}

.button {
    width: 130px;
    height: 25px;

    margin-left: 10px;
    margin-right: 10px;

    background-color: #EB5876;

    
    box-shadow: 0px 0px 3px #EB5876;

    display: flex;
    justify-content: center;
    align-items: center;

    -ms-transform: skewX(-30deg);
    -webkit-transform: skewX(-30deg);
    transform: skewX(-30deg);
}

.button-text {
    font-family: "Akzidenz Medium";
    font-size: 12px;
    color: white;
    text-decoration: none;
    -ms-transform: skewX(30deg);
    -webkit-transform: skewX(30deg);
    transform: skewX(30deg); 
    
}

</style>