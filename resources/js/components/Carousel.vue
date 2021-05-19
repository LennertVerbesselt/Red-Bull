
  <template>
    <div class="carousel">
    <agile :dots="true" :navButtons="false">
        <div v-for="n in 5" :key="n">
            <div class="slide">
                <div class="imgagebox">
                <img :src="featuredevents[n-1][1]" alt="">
                </div>
                <p></p>
            </div>
        </div>
        
    </agile>
    
    </div>
    
    
    
</template>


<script>
import { VueAgile } from 'vue-agile'

export default { 
    components: {
        agile: VueAgile 
    },
    data: function () {
        return {
            featuredevents: {
                0: {
                    0: [],
                    1: "",
                },
                1: {
                    0: [],
                    1: "",
                },
                2: {
                    0: [],
                    1: "",
                },
                3: {
                    0: [],
                    1: "",
                },
                4: {
                    0: [],
                    1: "",
                },
            },
        }
    },
    methods: {
        getFeaturedEvents(){
            axios.get('api/getfeaturedevents').then(response => {
                
                this.featuredevents = response.data.featuredevents;
                console.log(response.data.featuredevents);
                return response.data.featuredevents;
            });
        }
    },
    created() {
        this.getFeaturedEvents();
    }
}
</script>

<style scoped>

.agile {
    width: 100%;
     
}

.slide {
    align-items: center;
    display: flex;
    height: 200px;
    max-width: 100%;
    justify-content: center;
    margin: 0;
    top: 0;
    object-fit: cover;
    
}

img {
    max-width: 100%;
    margin: 0;
}

.imagebox {
    position: absolute;
    background-color: rgba(255,255,255,0.5);
       background: linear-gradient(to bottom, rgba(0,47,75,0.5) 0%,rgba(220, 66, 37, 0.5) 100%);
}


</style>