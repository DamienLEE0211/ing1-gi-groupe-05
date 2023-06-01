<template>
  <v-card class="ma-5 pa-5" style="height: 200px; display: flex; flex-direction: row; justify-content: space-between; align-items: flex-end;">
    <div style="display: flex; flex-direction: column">
      <p class="text-h2">{{ nom }} {{ prenom }}</p>
      <p  style="font-size: xx-large; color: grey">{{entreprise}}</p>
      <v-btn color="primary" size="medium" class="pa-2 my-3" :to=lienModif() >Modifier</v-btn>
    </div>
    <v-btn href="https://iapau.org/data-challenges/" class="ma-5" color="primary" >Proposer un nouveau projet  <v-icon class="mx-1">mdi-arrow-expand-right</v-icon></v-btn>
  </v-card>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'InfoPerso',

  components: {},
  data() {
    return {}
  },
  props: {
    nom: String,
    prenom: String,
    entreprise: String
  },
  methods: {
    lienModif(){
      var id = "xxx"
      return `/gestionnaire/${id}/modification-profil`
    }
  }
})
</script>