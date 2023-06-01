<template>
  <div class="containerG">
    <CardDirection titre="Réglement Data Challenges" text="Retrouvez toutes les règles et déroulement de nos Data challenges." num-image="1" chemin="/reglement-data-challenge" style="align-self: end"/>
    <CardDirection titre="Nos évènements" text="Data challenges ou data battles, retrouvez tous nos évènement." num-image="3" chemin="/evenements"/>
    <CardDirection titre="Réglement Data Battles" text="Retrouvez toutes les règles et déroulement de nos Data battles." num-image="2" chemin="/reglement-data-battle" style="align-self: end"/>
  </div>

</template>

<script>
import CardDirection from './CardDirection.vue'

export default {
  name: 'TrioCards',
  components: { CardDirection },
  data() {
    return {}
  }
}
</script>

<style>
.containerG {
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  width: 70%;
  height: 500px;
  margin: 20px auto;
}
</style>