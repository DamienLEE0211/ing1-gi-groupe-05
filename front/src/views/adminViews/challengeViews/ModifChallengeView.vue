<template>
  <div>
    <MenuHeader />
    <div class="milieu_o">
      <div class="boutons1">
        <div class="titre1">
          <h1>Outils Data Challenges</h1>
          <img
            class="imgoutil"
            src="@/assets/logospagesadmin/Outils.png"
            alt="image outils"
            id="imgoutils"
            width="50"
            height="50"
          />
        </div>
        <hr />
        <div>
          <v-btn class="bouton_o">Afficher la liste des data challenges</v-btn>
        </div>
        <div>
          <router-link :to="dc_form_link" v-slot="{ navigate }">
            <v-btn class="bouton_o" @click="navigate">Ajouter un data challenge</v-btn>
          </router-link>
        </div>
      </div>
    </div>
    <Footer/>
  </div>
</template>

<script>
import MenuHeader from '../../../components/MenuHeader.vue'
import Footer from '../../../components/Footer.vue'

export default {
  data() {
    return {
      dc_form_link: '/admin/:id/nouvel-evenement'
    }
  },
  components: {
    Footer,
    MenuHeader,
  }
}
</script>