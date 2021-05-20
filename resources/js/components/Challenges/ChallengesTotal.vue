<template>

<li class="category" :key="category" v-for="category in Categories">
    <div>
    <ChallengeCategory :CategoryFavourites="Favourites" :CategoryID="category.category_id" :CategoryName="category.category_name" :CategoryPoints="Points"></ChallengeCategory>
    </div>
</li>

</template>
<script>

import ChallengeCategory from './ChallengeCategory.vue'

export default {
    name: 'ChallengeTotal',
    components: {
        ChallengeCategory,
    },
    props: {

    },
    data:function() {
        return {
            Category: "Football",
            Points: 56,
            Categories: [],
        }
    },
    methods: {
        getCategories() {
            axios.get('api/getcategories').then(response => {
                this.Categories=response.data.categories;
                console.log("Categories Obtained");
            }).catch(error => {
                console.log("Error, categories not obtained");
            });
        },
         

    },
    created() {
        this.getCategories();
    }
    
}
</script>

<style scoped>

li {
    list-style-type: none;
}

</style>