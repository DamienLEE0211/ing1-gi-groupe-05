<template>
  <v-card class="ma-5 pa-5">
    <p class="text-h5" style="margin: 0 auto; text-align: center">Equipe</p>
    <v-banner v-for="p in data"
    :icon=iconGenerate(p)
    >
      <v-banner-text>
        {{p.prenom}} {{p.nom}} [{{p.niveau}} - {{p.ecole}} {{p.ville}}] <br>
        {{p.email}}
      </v-banner-text>
    </v-banner>
  </v-card>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'tabEquipe',

  components: {},
  data() {
    return {}
  },
  props: {
    data: Array
  },
  methods: {
    iconGenerate(p){
      if (p.capitaine){
        return "mdi-account-alert-outline"
      } else {
        return "mdi-account"
      }
    }
  }
})
</script>