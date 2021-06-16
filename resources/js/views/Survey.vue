<template>


    <h1 class="pagetitle">What do you find interesting?</h1>
    <div class="instructions">Select all that apply:</div>

    <form  @submit.prevent="updateInterests">
        <div class="container">
        <ul class="ks-cboxtags" :key="category" v-for="category in Categories">
            <li><input v-model="fields[category.category_name]" class="box" type="checkbox" :id="category.category_id" value="{{category.category_id}}"><label :for="category.category_id">{{category.category_name}}</label></li>
        </ul>
        </div>
        <form-button class="button" type="primary submit">I'm done!</form-button>
    </form>

    <div class="loading" v-if="loading"><div class="bg"><div class="scaling-squares-spinner" :style="spinnerStyle">
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
</div></div></div>
    
</template>

<script>

import FormButton from '../components/FormButton.vue'

export default {
    name: 'Survey',
    components: {
        FormButton,
    },
    props: {

    },
    data:function() {
        return {
            Categories: [],
            fields: {},
            loading: false,
        }
    },
    methods: {
        getCategories() {
            this.loading = true;
            axios.get('api/getcategories').then(response => {
                this.Categories=response.data.categories;
                this.Categories.forEach(element => {
                    this.fields[element.category_name] = false;
                });
                this.loading =false;
                console.log("Categories Obtained");
            }).catch(error => {
                console.log("Error, categories not obtained");
            });
        },

        updateInterests(){
            this.loading = true;
            axios.post('api/updateinterests', {data: this.fields}).then(response => {
                this.$router.push('/');
            }).catch(error => {
                console.log("Error, categories not obtained");
                this.loading = false;
            });
        },
    },
    created() {
        this.getCategories();
        
    }, 
    mounted() {

    }

    
}
</script>

<style scoped>

.instructions {
    font-family: "Akzidenz Regular";
    font-size: 14px;
    color: white;
    letter-spacing: 1px;
}

.button {
    margin: 30px;
}

.pagetitle {
  
  font-family: "Akzidenz Bold Extended";
  color:white;
  font-size: 22px;
  letter-spacing: 1px;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  text-align: center;

  width:100%;
  height: 100%;
  margin-top: 50px;
  
  z-index: 3;
}

.container {
    max-width: 640px;
    font-family: "Akzidenz Bold Extended";
    font-size: 13px;
    margin-top: 25px;
}



ul.ks-cboxtags {
    list-style: none;
    padding: 0px;
}
ul.ks-cboxtags{
  display: inline-block;
}
ul.ks-cboxtags li label{
    display: inline;
    background-color: rgba(255, 255, 255, 1);
    border: 2px solid rgba(255, 88, 118, 1);
    color: #121426;
    border-radius: 6px;
    white-space: nowrap;
    margin: 4px 4px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.ks-cboxtags li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label {
    border: 2px solid #EB5876;
    background-color: #EB5876;
    color: #fff;
    transition: all .2s;
}

ul.ks-cboxtags li input[type="checkbox"] {
  display: absolute;
}
ul.ks-cboxtags li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.ks-cboxtags li input[type="checkbox"]:focus + label {
  border: 2px solid #EB5876;
}



</style>