<template>
  <table style="color: white; width: 30%; margin: 20px auto; font-size: x-large">
    <tr style="text-align: center">
      <td style="border-right: solid 1px white; width: 50%">
        <b>Data challenge</b> <br>
        1 week-end <br>
        plusieurs sujets <br>
        <v-btn rounded="xl" size="small" style="width: 80%; padding: 5px; margin: 20px auto" to="/reglement-data-challenge">Règlement et déroulé</v-btn>
      </td>
      <td>
        <b>Data battle</b> <br>
        1 mois <br>
        un seul sujet <br>
        <v-btn rounded="xl" size="small" style="width: 80%; padding: 5px; margin: 20px auto" to="/reglement-data-battle">Règlement et déroulé</v-btn>
      </td>
    </tr>
  </table>
</template>
<script setup>
</script>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: 'TabPrezEvent'
})
</script>