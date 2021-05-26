<template>
<challenges-navigation @change-favourites="changeFavourites"></challenges-navigation>
<div v-if="!FavouritesActive">
<li  class="category" :key="category" v-for="category in ChallengesPage">
    <div>
    <ChallengeCategory :CategoryFavourites="Favourites" :CategoryID="category.category_id" :CategoryName="category.category_name" :Category="category"></ChallengeCategory>
    </div>
</li>
</div>

<div v-if="FavouritesActive">
<li  class="category" :key="category" v-for="category in ChallengesPage">
    <div v-if="FavouriteCategories[category.category_name]">
    <ChallengeCategory :CategoryFavourites="Favourites" :CategoryID="category.category_id" :CategoryName="category.category_name" :Category="category"></ChallengeCategory>
    </div>
</li>
</div>

</template>
<script>

import ChallengeCategory from './ChallengeCategory.vue'
import ChallengesNavigation from './ChallengeNavigation.vue'

export default {
    name: 'ChallengeTotal',
    components: {
        ChallengeCategory,
        ChallengesNavigation
    },
    props: {

    },
    data:function() {
        return {
            Category: "Football",
            Points: 56,
            Categories: [],
            FavouriteCategories: [],
            Favourites: [],
            FavouritesActive: false,
            ChallengesPage: [],
        }
    },
    methods: {
        getCategories() {
            axios.get('api/getcategories').then(response => {
                this.Categories=response.data.categories;
                this.Favourites = response.data.favourites;
                this.FavouriteCategories = response.data.favouritecategories;
                console.log("Categories Obtained");
            }).catch(error => {
                console.log("Error, categories not obtained");
            });
        },

        getChallengesPage() {
            axios.get('api/getchallengespage').then(response => {
                console.log(response.data);
                this.ChallengesPage = response.data.challengespage;
                this.FavouriteCategories = response.data.favouritecategories;

                console.log("All Challenges Obtained");
            }).catch(error => {
                console.log("Error, All challenges not obtained");
            });
        },

        changeFavourites() {
            this.FavouritesActive = !this.FavouritesActive;
            this.getChallengesPage();
            
        }
         

    },
    created() {
        this.getChallengesPage();
    }
    
}
</script>

<style scoped>

li {
    list-style-type: none;
}

</style>