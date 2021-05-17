
  <template>
    <div class="carousel">
    <agile :dots="true">
        <div class="slide">
            <img src="../../assets/Neymar5.jpg" alt="">
        </div>
        
        ...
        
        <div class="slide">
            <img src="../../assets/AirFlick.jpg" alt="">
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
body {
    display: flex;
    margin: 0;
}
.agile {
    width: 100%;
}
.slide {
    align-items: center;
    display: flex;
    height: 200px;
    justify-content: center;
    margin: 0;
}
img {
    height: 200px;
    margin: 0;
}
</style>