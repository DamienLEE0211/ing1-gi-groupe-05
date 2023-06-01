<template>
  <v-card
    class="mx-auto my-6"
    max-width="344"
    elevation="4"
    :to="chemin"
    :height="hauteur"
    width="300px"
  >
    <v-img :src="imFond1" height="200px" cover v-if="numImage == 1"></v-img>
    <v-img :src="imFond2" height="200px" cover v-else-if="numImage == 2"></v-img>
    <v-img :src="imFond3" height="200px" cover v-else-if="numImage == 3"></v-img>
    <v-img :src="lienimage" height="200px" cover v-else></v-img>

    <v-card-title>
      {{ titre }}
    </v-card-title>

    <v-card-subtitle>
      {{ sousTitre }}
    </v-card-subtitle>

    <v-card-text>
      {{ text }}
    </v-card-text>
  </v-card>
</template>

<style></style>

<script>
import { th } from "vuetify/locale";

export default {
  name: 'CardDirection',
  data() {
    return {
      image: String,
      hauteur: Number
    }
  },
  props: {
    titre: String,
    text: String,
    numImage: Number,
    chemin: String,
    lienimage: String,
    sousTitre: String
  },
  created() {
    if (this.text == null){
      if (this.sousTitre == null) {
        this.hauteur = "250px"
      } else {
        this.hauteur = "280px"
      }
    } else {
      this.hauteur = "350px"
    }
  }
}
</script>
<script setup>
import imFond1 from '../../assets/imFond1.jpg'
import imFond2 from '../../assets/imFond2.jpg'
import imFond3 from '../../assets/imFond3.jpg'
</script>

<style></style>