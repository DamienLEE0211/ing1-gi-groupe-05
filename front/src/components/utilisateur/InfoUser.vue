<template>
    <v-card class="ma-5 pa-5" style="height: 150px; width: 20%; display: flex; flex-direction: row; justify-content: space-between; align-items: flex-end;">
      <div style="display: flex; flex-direction: column">
        <p class="text-h2">{{ nom }} {{ prenom }}</p>
        <v-btn color="primary" size="medium" class="pa-2 my-3" :to=lien >Modifier</v-btn>
      </div>
    </v-card>
    <div style="height: 400px; background-color: #0e8769;"></div>
</template>

<style>

</style>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: 'InfoUser',

  components: {
  },
  data() {
    return {
    }
  },
  props: {
    prenom: String,
    nom: String,
    lien: String
  }
})
</script>