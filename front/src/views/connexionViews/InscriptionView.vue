<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <FormInscription/>
    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

// Components
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'
import FormInscription from '../../components/connexionInscription/FormInscription.vue'

export default defineComponent({
  name: 'ConnexionView',

  components: {
    FormInscription,
    Footer,
    MenuHeader
  }
})
</script>