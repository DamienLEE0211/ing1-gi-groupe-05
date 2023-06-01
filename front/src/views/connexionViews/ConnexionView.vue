<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <FormConnexion />
    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

// Components
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'
import FormConnexion from '../../components/connexionInscription/FormConnexion.vue'

export default defineComponent({
  name: 'ConnexionView',

  components: {
    FormConnexion,
    Footer,
    MenuHeader
  }
})
</script>