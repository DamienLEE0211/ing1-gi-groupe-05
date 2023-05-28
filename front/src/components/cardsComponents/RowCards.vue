<template>
  <div class="container">
    <CardDirection
      v-if="type != 'All'"
      v-for="item in data"
      :titre=item.title
      :chemin= cheminConca(item.id)
      :lienimage=item.lien
    />
    <CardDirection
      v-else
      v-for="item in data"
      :titre=item.title
      :chemin= cheminConca(item.id)
      :lienimage=item.lien
      :sous-titre=item.type
    />
  </div>
</template>

<script>
import CardDirection from './CardDirection.vue'

export default {
  name: 'RowCards',
  components: { CardDirection },
  data() {
    return {}
  },
  props: {
    data: Array,
    type: String
  },
  methods: {
    cheminConca(id){
      return "/event/"+id;
    }
  }
}
</script>

<style>
.container {
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  width: 95%;
  margin: 2px auto;
  height: auto;
}
</style>