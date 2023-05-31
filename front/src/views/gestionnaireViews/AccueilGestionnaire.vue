<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />

    <InfoPerso nom="Durant" prenom="Paul" entreprise="Omega365"/>
    <ColonneCards id="xxxx"/>
    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

// Components
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'
import InfoPerso from '../../components/utilisateur/infoPerso.vue'
import ColonneCards from '../../components/cardsComponents/ColonneCards.vue'

export default defineComponent({
  name: 'AccueilGestionnaire',

  components: {
    ColonneCards,
    InfoPerso,
    Footer,
    MenuHeader
  }
})
</script>