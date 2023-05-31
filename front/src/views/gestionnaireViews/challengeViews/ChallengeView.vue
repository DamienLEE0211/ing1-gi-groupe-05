<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <h1 style="color: white; font-size: xxx-large; text-align: center; margin: 20px">
      {{ event.title }}
    </h1>
    <div class="formCadre">
      <div class="description">
        <v-img :src="event.lien" />
        <div class="textDescription">
          <p class="text-overline">{{ event.type }}</p>
          <p class="text-subtitle-1">{{ event.dateDebut }} - {{ event.dateFin }}</p>
          <p class="text-body-1 my-4">{{ event.description }}</p>
          <v-btn
            rounded="xl"
            size="large"
            style="width: 30%; padding: 5px; margin: 40px auto"
            color="primary"
            >Envoyer un message général</v-btn
          >
          <v-btn
            rounded="xl"
            size="large"
            style="width: 20%; padding: 5px; margin: 40px auto"
            color="primary"
            class="mx-6"
          >Questionnaire</v-btn
          >
        </div>
      </div>
    </div>
    <p class="text-h3 mt-5 font-weight-medium" style="color: white; text-align: center">Projets</p>
    <TabCards type="projet"/>
    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import Footer from '../../../components/Footer.vue'
import MenuHeader from '../../../components/MenuHeader.vue'
import TabPrezEvent from '../../../components/accueilComponents/TabPrezEvent.vue'
import TabCards from '../../../components/cardsComponents/TabCards.vue'

// Components

export default defineComponent({
  name: 'ChallengeView',

  components: {
    TabCards,
    TabPrezEvent,
    Footer,
    MenuHeader
  },
  data() {
    return {
      objetTest: {
        title: 'Titre 1',
        lien: 'https://img.freepik.com/free-photo/space-background-realistic-starry-night-cosmos-shining-stars-milky-way-stardust-color-galaxy_1258-154643.jpg',
        id: '846se45fez6cds',
        type: 'Data Challenge',
        description:
          'Hoc dici quidem humanitatem hoc quasi sit omnes penitus ingeni Etenim ne continentur Etenim humanitatem aut commune neque quidem cognatione disciplina fuimus quasi penitus miretur quidem aut quasi uni dediti dicendi nos quasi penitus studio dicendi studio aut studio aut.',
        dateDebut: '12/05/2024',
        dateFin: '14/05/2024'
      },
      event: Object
    }
  },
  mounted() {
    this.id = this.$route.params.event
    this.event = this.getEventInfo(this.id)
  },
  methods: {
    getEventInfo(id) {
      return this.objetTest
    }
  }
})
</script>