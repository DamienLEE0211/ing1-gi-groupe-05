<template>
  <v-card
    class="mx-auto"
    color="grey-lighten-3"
  >
    <v-card-text>
      <v-text-field
        :loading="loading"
        density="compact"
        variant="solo"
        label="Chercher un utilisateur"
        append-inner-icon="mdi-magnify"
        single-line
        hide-details
        @click:append-inner="onClick"
      ></v-text-field>
    </v-card-text>
  </v-card>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: 'BarRecherche',

  components: {

  },
  data() {
    return {

    }
  }})
</script>