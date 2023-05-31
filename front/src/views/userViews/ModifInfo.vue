<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />

    <modif-info-perso :type=type />
    <v-btn width="10%" style="margin: 20px auto" @click="$router.back()">Retour</v-btn>
    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

// Components
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'
import ModifInfoPerso from '../../components/utilisateur/modifInfoPerso.vue'

export default defineComponent({
  name: 'ModifInfo',

  components: {
    ModifInfoPerso,
    Footer,
    MenuHeader
  },
  data() {
    return {
      type: "admin"
    }
  }
})
</script>