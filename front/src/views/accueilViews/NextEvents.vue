<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <ImageTitre />;
    <h1 style="color: white; text-align: center; margin: 20px; font-size: xxx-large">
      Nos prochains évènements
    </h1>
    <p
      style="
        color: white;
        text-align: center;
        margin: 20px;
        font-size: large;
        width: 70%;
        margin: 10px auto;
      "
    >
      Un Data Challenge ou une Data Battle est une compétition entre équipes d’étudiants sur des
      problèmes liés à des données sous la tutelle des experts en data science de l’association.
    </p>
    <TabPrezEvent />
    <DuoCards />
    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

// Components
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'
import ImageTitre from '../../components/accueilComponents/ImageTitre.vue'
import CardDirection from '../../components/cardsComponents/CardDirection.vue'
import CardsDirection from '../../components/cardsComponents/TrioCards.vue'
import RowCards from '../../components/cardsComponents/TabCards.vue'
import TabPrezEvent from '../../components/accueilComponents/TabPrezEvent.vue'
import DuoCards from '../../components/cardsComponents/DuoCards.vue'

export default defineComponent({
  name: 'NextEvent',

  components: {
    DuoCards,
    TabPrezEvent,
    RowCards,
    CardsDirection,
    CardDirection,
    ImageTitre,
    Footer,
    MenuHeader
  }
})
</script>