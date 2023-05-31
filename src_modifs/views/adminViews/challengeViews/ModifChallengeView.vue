<template>
  <div>
    <HeaderVue></HeaderVue>
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
    <FooterVue></FooterVue>
  </div>
</template>

<script>
import HeaderVue from "@/components/HeaderVue.vue";
import FooterVue from "@/components/FooterVue.vue";
export default {
  data() {
    return {
      dc_form_link: '/admin/1/nouvel-evenement' //il faut mettre l'id de l'admin à la place du 1(back)
    }
  },
  props:['id'],
  components: {
    HeaderVue,
    FooterVue
  }
}
</script>