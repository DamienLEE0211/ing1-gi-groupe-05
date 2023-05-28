<template>
  <v-img class="imageFond" :src=montagnes height=350px cover></v-img>
  <div class="text">
    <h1 class="title">IA PAU - Data Challenges</h1>
    <v-btn size="large" rounded="xl" elevation="4" class="bProchainEvent" to="/prochains-evenements">Prochains évènements</v-btn>
  </div>

</template>

<style>
</style>

<script>
export default {
  name: 'ImageTitre',
  data() {
    return {

    }
  }
}

</script>
<script setup>
import montagnes from '../../assets/montagnes.jpg'
</script>

<style>

.imageFond {
  text-align: center;
  opacity: 70%;
  clip-path: polygon(0% 0%, 100% 0%, 100% 77.5%, 68.3% 100%, 68.4% 100%, 0% 85%);
}

.title {
  color: white;
  font-size: 5em;
  text-align: center;
  margin: 3%;
  text-shadow: 1px 1px 2px black;
}

.text {
  position: absolute;
  top: 120px;
  width: 100%;
  align-content: center;
  text-align: center;
}

</style>