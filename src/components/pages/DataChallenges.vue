<template>
  <div class="milieu_o">
    <div class="boutons1">
      <div class="titre1">
        <h1>Outils Data Challenges</h1>
        <img
          class="imgoutil"
          src="../../assets/Outils.png"
          alt="image outils"
          id="imgoutils"
          width="50"
          height="50"
        />
      </div>
      <hr />
      <div>
        <button class="bouton_o">Afficher la liste des data challenges</button>
      </div>
      <div>
        <router-link :to="dc_form_link" v-slot="{ navigate }">
          <button
            class="bouton_o"
            @click="navigate"
          >
            Ajouter un data challenge
          </button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dc_form_link: "/datachallenges/formulaire_dc",
    };
  },
};
</script>
