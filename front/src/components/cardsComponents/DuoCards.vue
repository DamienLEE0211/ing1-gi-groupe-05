<template>
  <div class="containerG">
    <CardDirection
      v-if="donneeTest.length !== 0"
      v-for="donnee in tabDonne"
      :titre="donnee.title"
      :lienimage="donnee.lien"
      :sousTitre="donnee.type"
      :chemin=cheminConca(donnee.id)
    />
    <p v-else style="color: white; font-size: large; text-align: center">
      Aucun évènement disponible pour l'instant !
    </p>
  </div>
</template>

<script>
import CardDirection from './CardDirection.vue'
import RowCards from './RowCards.vue'

export default {
  name: 'DuoCards',
  components: { RowCards, CardDirection },
  data() {
    return {
      donneeTest: [
        {
          title: 'Titre 1',
          lien: 'https://img.freepik.com/free-photo/space-background-realistic-starry-night-cosmos-shining-stars-milky-way-stardust-color-galaxy_1258-154643.jpg',
          id: '846se45fez6cds',
          type: 'Data Battle'
        },
        {
          title: 'Titre 2',
          lien: 'https://images.ctfassets.net/hrltx12pl8hq/3j5RylRv1ZdswxcBaMi0y7/b84fa97296bd2350db6ea194c0dce7db/Music_Icon.jpg',
          id: '95ds2dces',
          type: 'Data Battle'
        },
        {
          title: 'Titre 3',
          lien: 'https://png.pngtree.com/illustrations/20190327/ourmid/pngtree-cure-starry-sky-night-sky-star-png-image_38228.jpg',
          id: 'ds2148zef',
          type: 'Data Challenge'
        },
        {
          title: 'Titre 4',
          lien: 'https://img.freepik.com/free-photo/space-background-realistic-starry-night-cosmos-shining-stars-milky-way-stardust-color-galaxy_1258-154643.jpg',
          id: '846se45fez6cds',
          type: 'Data Battle'
        },
        {
          title: 'Titre 5',
          lien: 'https://images.ctfassets.net/hrltx12pl8hq/3j5RylRv1ZdswxcBaMi0y7/b84fa97296bd2350db6ea194c0dce7db/Music_Icon.jpg',
          id: '95ds2dces',
          type: 'Data Challenge'
        },
        {
          title: 'Titre 6',
          lien: 'https://png.pngtree.com/illustrations/20190327/ourmid/pngtree-cure-starry-sky-night-sky-star-png-image_38228.jpg',
          id: 'ds2148zef',
          type: 'Data Challenge'
        },
        {
          title: 'Titre 7',
          lien: 'https://png.pngtree.com/illustrations/20190327/ourmid/pngtree-cure-starry-sky-night-sky-star-png-image_38228.jpg',
          id: 'ds2148zef',
          type: 'Data Challenge'
        }
      ],
      tabDonne: []
    }
  },
  props: {
    type: String
  },
  mounted() {
    let data = this.donneeTest
    this.tabDonne = data.slice(0, 2)
    console.log(this.tabDonne)
  },
  methods: {
    cheminConca(id){
      return "/event/"+id;
    }
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