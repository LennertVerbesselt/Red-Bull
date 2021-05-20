
  <template>
    <div class="carousel">
    <agile :dots="true" :navButtons="false">
        <div v-for="n in 5" :key="n">
            <div class="slide">
                <div class="imgagebox">
                <img :src="featuredevents[n-1][1]" alt="">
                <img src="./../../assets/gradient.png" alt="" class="gradient">
                <h1 class="EventName">{{featuredevents[n-1][0]['name']}}</h1>
                <h2 class="EventDate">{{getDatefromDatetime(featuredevents[n-1][0]['datetime'])}}</h2>
                </div>
                
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
                    0: {
                        name: "Loading"
                    },
                    1: "https://redbullapp.s3.eu-west-2.amazonaws.com/EventHeaders/default.jpg",
                },
                1: {
                    0: {
                        name: "Loading"
                    },
                    1: "https://redbullapp.s3.eu-west-2.amazonaws.com/EventHeaders/default.jpg",
                },
                2: {
                    0: {
                        name: "Loading"
                    },
                    1: "https://redbullapp.s3.eu-west-2.amazonaws.com/EventHeaders/default.jpg",
                },
                3: {
                    0: {
                        name: "Loading"
                    },
                    1: "https://redbullapp.s3.eu-west-2.amazonaws.com/EventHeaders/default.jpg",
                },
                4: {
                    0: {
                        name: "Loading"
                    },
                    1: "https://redbullapp.s3.eu-west-2.amazonaws.com/EventHeaders/default.jpg",
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
        },

        getDatefromDatetime(datetime){
            var phpdate = String(datetime);
            var date = phpdate.substring(0,10);
            return date;
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

.EventName {
    font-family: "Akzidenz Bold";
    font-size: 20px;
    color: white;

    position: absolute;
    top: 58%;
    width:100%;
}

.EventDate {
    font-family: "Akzidenz Light";
    font-size: 12px;
    color: white;
    position: absolute;
    top: 74%;
    width:100%;
}

.gradient {
    width: 100%;
    height: 200px;

    position: absolute;
    top:10px;
}


</style>