<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <InfoUser :nom="nom" :prenom="prenom" :lien="lienModif()" />
    <BarRecherche style="width: 30%"/>
    <div style="height: 400px; background-color: #0e8769"></div>
    <Footer />
  </div>
</template>

<style></style>
<script>
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'
import { defineComponent } from 'vue'
import InfoUser from '../../components/utilisateur/InfoUser.vue'
import BarRecherche from '../../components/adminComponents/BarRecherche.vue'

export default defineComponent({
  name: 'AccueilAdmin',

  components: {
    BarRecherche,
    InfoUser,
    MenuHeader,
    Footer
  },
  data() {
    return {
      nom: 'Layus',
      prenom: 'Clara'
    }
  },
  methods: {
    lienModif() {
      var id = 'xxx'
      return `/gestionnaire/${id}/modification-profil`
    }
  }
})
</script>