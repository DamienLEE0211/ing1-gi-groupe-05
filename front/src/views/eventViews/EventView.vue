<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <h1 style="color: white; font-size: xxx-large; text-align: center; margin: 20px">{{ event.title }}</h1>
    <div class="formCadre">
      <div class="description">
        <v-img :src="event.lien"/>
        <div class="textDescription">
          <p class="text-overline">{{event.type}}</p>
          <p class="text-subtitle-1">{{event.dateDebut}} - {{event.dateFin}}</p>
          <p class="text-body-1 my-4">{{event.description}}</p>
          <v-btn rounded="xl" size="large" style="width: 15%; padding: 5px; margin: 40px auto" color="primary">Participer</v-btn>
        </div>
      </div>
    </div>
    <div class="baseButtons">
      <v-btn v-if="event.type == 'Data Challenge'" rounded="xl" size="large" style="width: 15%; padding: 5px; margin: 40px auto" to="/reglement-data-challenge">Règlement et déroulé</v-btn>
      <v-btn v-else rounded="xl" size="large" style="width: 15%; padding: 5px; margin: 40px auto" to="/reglement-data-battle">Règlement et déroulé</v-btn>
      <v-btn rounded="xl" size="large" style="width: 15%; padding: 5px; margin: 40px auto" @click="$router.back()">Retour</v-btn>
    </div>
    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

// Components
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'

export default defineComponent({
  name: 'AccueilSite',
  data() {
    return {
      objetTest: {
        title: 'Titre 1',
        lien: 'https://img.freepik.com/free-photo/space-background-realistic-starry-night-cosmos-shining-stars-milky-way-stardust-color-galaxy_1258-154643.jpg',
        id: '846se45fez6cds',
        type: 'Data Challenge',
        description: "Hoc dici quidem humanitatem hoc quasi sit omnes penitus ingeni Etenim ne continentur Etenim humanitatem aut commune neque quidem cognatione disciplina fuimus quasi penitus miretur quidem aut quasi uni dediti dicendi nos quasi penitus studio dicendi studio aut studio aut.",
        dateDebut: "12/05/2024",
        dateFin: "14/05/2024"
      },
      id: String,
      event: Object
    }
  },
  components: {
    Footer,
    MenuHeader
  },
  mounted() {
    this.id = this.$route.params.event;
    this.event = this.getEventInfo(this.id);
  },
  methods: {
    getEventInfo(id) {
      return this.objetTest;
    }
  }
})
</script>

<style>
.formCadre {
  clip-path: polygon(99.6% 0%, 100% 0%, 100% 30%, 100% 84%, 59.6% 100%, 59.5% 100%, 0% 93%, 0% 9.3%);
  background-color: white;
  height: 400px;
  display: flex;
  align-items: center;
}
.description {
  display: flex;
  flex-direction: row;
  height: 75%;
  align-self: center;
  width: 90%;
}

.baseButtons {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

.textDescription {
  width: 90%;
}

</style>