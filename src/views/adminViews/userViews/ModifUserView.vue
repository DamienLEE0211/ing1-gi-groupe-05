<template>
  <div>
    <HeaderVue></HeaderVue>
    <div class="milieu_o">
      <div class="boutons1">
        <div class="titre1">
          <h1>Outils Utilisateurs</h1>
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
        <br>
        <div>
          <v-btn class="bouton_o">Afficher la liste des utilisateurs</v-btn>
        </div>
        <div>
          <router-link :to="user_form_link" v-slot="{ navigate }">
            <v-btn class="bouton_o" @click="navigate">Ajouter un utilisateur</v-btn>
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
      user_form_link: '/admin/:id/nouvel-utilisateur'
    }
  },
  components:{
    HeaderVue,
    FooterVue
  }
}
</script>

<style>
.milieu_o {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-top: 140px; /*100px de la taille de l'entête + 2*20px de padding de l'entête*/
  background-color: #0e8769;
}

.boutons1 {
  background-color: white;
  width: 50%;
  min-width: 600px;
  max-width:50%;
  height: 600px;
  border-radius: 20px;
  margin: 20px;
}

.titre1 {
  display: flex;
  align-items: center;
  justify-content: center;
}

.imgoutil {
  margin-left: 20px;
}

.bouton_o {
  width: 400px;
  min-width: 400px;
  margin-left: 20px;
  margin-bottom: 10px;
  height: 100px;
  overflow: hidden;
  font-size: 20px;
  border-radius: 10px;
}

</style>