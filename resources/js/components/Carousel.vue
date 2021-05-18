
  <template>
    <div class="carousel">
    <agile :dots="true" :navButtons="false">
        <div class="slide">
            <div class="imgagebox">
            <img src="../../assets/Neymar5.jpg" alt="">
            </div>
        </div>
        
        <div class="slide">
            <img  src="../../assets/AirFlick.jpg" alt="">
        </div>
    </agile>
    
    </div>
    
    
    
</template>


<script>
import { VueAgile } from 'vue-agile'

export default { 
    components: {
        agile: VueAgile 
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