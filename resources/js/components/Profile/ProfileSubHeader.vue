<template>

  <div class="profile-sub-header">
      <div class="foreach-category" :key="category" v-for="category in CurrencyPoints">
          <div class="icon">
              <img :src="category.icon" />
              </div>
          <div class="currency-points">
              {{category.points}}
              
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
            categoryicon: "../../assets/icons/categories/",
        }
    },
	methods: {
        getURL(name){
            this.categoryicon += name;
            this.categoryicon += ".svg"
            console.log(this.categoryicon);
        }
	},
    created() {
    },
	mounted() {
		
	}
}
</script>

<style scoped>

.profile-sub-header {
    width: 100%;
    height: 80px;
    position: relative;

    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    overflow-y:hidden;
    -webkit-overflow-scrolling: touch;
}

.foreach-category {
    flex: 0 0 auto;
    margin-left: 5px;
    margin-right: 5px;
    width: 100px;

    font-family: "Akzidenz Medium";
    font-size: 14px;
    color:white;

    display: flex;
    justify-content: center;
    align-items: center;
}

.currency-points {
    font-family: "Akzidenz Bold Extended";
    font-size: 25px;
}

.currency-name {
    position: relative;
    top: 15px;
}

.icon {
    position: absolute;

    display: flex;
    justify-content: center;
    align-items: center;
}

.icon img {
    
    top: 0px;
    max-height: 80px;
    max-width: 100px;
    opacity: .2;
}

</style>