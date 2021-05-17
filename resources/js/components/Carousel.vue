
  <template>
    <div class="carousel">
    <agile :dots="true" :navButtons="false">
        <div class="slide">
            <img src="../../assets/Neymar5.jpg" alt="">
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
    height: 200px;
    margin: 0;
}

</style>