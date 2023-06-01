<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <ImageTitre />;
    <h1 style="color: white; text-align: center; margin: 20px; font-size: xxx-large;">Nos Data Challenges</h1>
    <p style="color: white; text-align: center; margin: 20px; font-size: large">
      Un <b>data challenge</b> est une compétition entre équipes d’étudiants sur des problèmes liés à des données sous la tutelle des experts en data science de l’association.<br> <br>

      Il se déroule en générale durant un week-end et les projets sont proposés par une entreprise.
    </p>
    <v-btn rounded="xl" size="medium" style="width: 13%; padding: 5px; margin: 5px auto" to="/reglement-data-challenge">Règlement et déroulé</v-btn>
    <RowCards />
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
import CardsDirection from "../../components/cardsComponents/TrioCards.vue";
import RowCards from "../../components/cardsComponents/TabCards.vue";

export default defineComponent({
  name: 'DataChallengesList',

  components: {
    RowCards,
    CardsDirection,
    CardDirection,
    ImageTitre,
    Footer,
    MenuHeader
  }
})
</script>