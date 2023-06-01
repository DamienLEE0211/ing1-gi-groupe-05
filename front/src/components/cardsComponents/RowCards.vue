<template>
  <div class="container">
    <CardDirection
      v-if="type != 'All' && type != 'projet'"
      v-for="item in data"
      :titre=item.title
      :chemin= cheminConca(item.id,vide)
      :lienimage=item.lien
    />
    <CardDirection
      v-else-if="type == 'projet'"
      v-for="item in data"
      :titre=item.title
      :chemin= cheminConca(item.idEvent,item.idProjet)
      :lienimage=item.lien
    />
    <CardDirection
      v-else
      v-for="item in data"
      :titre=item.title
      :chemin= cheminConca(item.id,vide)
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
    return {
      vide: null
    }
  },
  props: {
    data: Array,
    gestion: String,
    type: String
  },
  methods: {
    cheminConca(idEvent, idProjet){
     if (this.type == "projet") {
       console.log(this.gestion+idEvent+"/"+idProjet)
       return this.gestion+idEvent+"/"+idProjet
     } else if (this.gestion != null) {
        return this.gestion+idEvent;
      } else {
        return "/event/"+idEvent;
      }
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