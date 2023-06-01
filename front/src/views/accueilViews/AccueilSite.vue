<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <ImageTitre />
    <TrioCards />
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
import TrioCards from "../../components/cardsComponents/TrioCards.vue";

export default defineComponent({
  name: 'AccueilSite',

  components: {
    TrioCards,
    CardDirection,
    ImageTitre,
    Footer,
    MenuHeader
  }
})
</script>