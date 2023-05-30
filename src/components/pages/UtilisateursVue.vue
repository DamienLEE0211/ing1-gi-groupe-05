<template>
  <div class="milieu_o">
    <div class="boutons1">
      <div class="titre1">
        <h1>Outils Utilisateurs</h1>
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
        <button class="bouton_o">Afficher la liste des utilisateurs</button>
      </div>
      <div>
        <router-link :to="user_form_link" v-slot="{ navigate }">
          <button class="bouton_o" @click="navigate">
            Ajouter un utilisateur
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
      user_form_link: "/utilisateurs/formulaire_u",
    };
  },
};
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
  width: 30%;
  margin-left: 20px;
  margin-bottom: 10px;
  height: 100px;
  overflow: hidden;
  font-size: 20px;
  border-radius: 10px;
}

.bouton_o:hover{
  width: 30%;
  margin-left: 20px;
  margin-bottom: 10px;
  height: 100px;
  overflow: hidden;
  font-size: 20px;
  border-radius: 10px;
  cursor:pointer;
}
</style>