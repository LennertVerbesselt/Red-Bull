<template>
<challenges-navigation @change-favourites="changeFavourites"></challenges-navigation>
<div v-if="!FavouritesActive">
<li  class="category" :key="category" v-for="category in ChallengesPage">
    <div>
    <ChallengeCategory :CategoryFavourite="category.favourite" :CategoryID="category.category_id" :CategoryName="category.category_name" :Category="category"></ChallengeCategory>
    </div>
</li>
</div>

<div v-if="FavouritesActive">
<li  class="category" :key="category" v-for="category in ChallengesPage">
    <div v-if="FavouriteCategories[category.category_name]">
    <ChallengeCategory :CategoryFavourite="category.favourite" :CategoryID="category.category_id" :CategoryName="category.category_name" :Category="category"></ChallengeCategory>
    </div>
</li>
</div>

<div class="loading" v-if="loading"><div class="bg"><div class="scaling-squares-spinner" :style="spinnerStyle">
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
</div></div></div>

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
            loading: false,
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
            this.loading = true;
            axios.get('api/getchallengespage').then(response => {
                console.log(response.data);
                this.ChallengesPage = response.data.challengespage;
                this.FavouriteCategories = response.data.favouritecategories;
                this.loading =false;
                console.log("All Challenges Obtained");
            }).catch(error => {
                console.log("Error, All challenges not obtained");
                this.loading =false;
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