<template>

<div class="categories">
    <div class="category">
        <div class="challengesets">
            <div class="challengeset">
                {{ChallengesInfo}}
            </div>
        </div>
    </div>
</div>

    
</template>

<script>
export default {
    name: 'UploadIcon',
    props: {
        Categories: Object,
        ChallengeSets: Object,
        ChallengeProgressions: Object,
        ChallengesInfo: Object,
    },
    data:function() {
        return {
            upload: false,
        }
    }
}
</script>

<style scoped>



</style>