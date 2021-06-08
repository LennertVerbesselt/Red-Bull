<template>

  <div class="profile-sub-header">
      <div class="foreach-category" :key="category" v-for="category in CurrencyPoints">
          
          <div class="currency-points">
              {{category.points}}
          </div>
          <div class="currency-name">
              {{category.category_name}}
          </div>
      </div>
  </div>

  

</template>

<script>


export default {
	name: 'ProfileSubHeader', 
    components: {
        
    },
    props: {
        CurrencyPoints: Object,
        Categories: Object,
    },
    data:function() {
        return {
        }
    },
	methods: {
	},
	mounted() {
		
	}
}
</script>

<style scoped>

.profile-sub-header {
    width: 100%;
    height: 100px;
    position: relative;

    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    /*-webkit-overflow-scrolling: touch;*/
}

.foreach-category {
    flex: 0 0 auto;
    margin-left: 5px;
    margin-right: 5px;
    width: 100px;

    font-family: "Akzidenz Medium";
    font-size: 18px;
    color:white;
}

.currency-points {
    font-family: "Akzidenz Bold Extended";
    font-size: 20px;
}

.currency-name {
    position: relative;
    top: 15px;
}

</style>