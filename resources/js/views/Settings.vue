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

<div class="account-wrapper">
    <div class="segment-title"><span>Account Settings</span></div>
</div>
<div class="privacy-wrapper">
    <div class="segment-title">Privacy Settings</div>
</div>
<div class="gdpr-wrapper">
    <div class="segment-title">GDPR Settings</div>
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
    font-size: 20px;
    color:white;

    margin-left: 10px;

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
    flex-flow: row;
    justify-content: space-between;
    align-items: center;
}

</style>