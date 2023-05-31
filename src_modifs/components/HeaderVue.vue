<template>
  <nav class="entete">
    <a class="logoaccueil" href=""
      ><img
        src="http://iapau.org/wp-content/uploads/2021/05/iapau_round.png"
        alt="Association IA Pau"
        id="logoaccueil"
        width="100"
    /></a>
    <div class="nav_buttons">
      <router-link :to="n.lien" class="bouton" v-for="n in nav" :key="n.nom">{{
        n.nom
      }}</router-link>
    </div>
    <div class="nav_icons">
      <a href=""
        ><img
          class="imgprofil"
          src="@/assets/logospagesadmin/Profil.png"
          alt="Photo de profil"
          id="imgprofil"
          width="50"
      /></a>
      <a class="imgmsg" href=""
        ><img
          src="@/assets/logospagesadmin/Messagerie.png"
          alt="Photo de messagerie"
          id="imgmsg"
          width="50"
      /></a>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      nav: [
        { nom: "Accueil", lien: `/admin/1` },  //il faut mettre l'id de l'admin à la place du 1(back)
        { nom: "Utilisateurs", lien: "/admin/1/:user/modification-utilisateur" },  //idem  (back)
        { nom: "Data Challenges", lien: "/admin/1/:event/modification-evenement" }  //idem  (back)
      ],
    };
  },
  props:['id'],
};
</script>

<style>
.entete {
  z-index: 1; /*Mise au plan "1" de l'entête,(pour un élément positionné seulement)*/
  height: 140px;
  width: 100%;
  display: inline-flex; /*L'entête est une boîte flexible, dispose ses enfants en ligne*/
  justify-content: space-between; /*Centrer horizontalement les enfants de l'entête (pour un zoom-dezoom propre)*/
  align-items: center; /*Centrer verticalement les enfants de l'entête*/
  padding: 20px;
  position: fixed; /*Voir l'entête même en scrollant, nécessite un background pour fonctionner*/
  top: 0; /*(Pour un element positionné seulement) 0 ecart avec le haut de la page*/
  left: 0; /*(pour un element positionné seulement) 0 ecart avec le côté gauche de la page*/
  right: 0; /*(Pour un element positionné seulement) 0 ecart avec le côté droit de la page*/
  background-color: white;
}

.bouton {
  padding-right: 10px;
  padding-left: 10px;
  margin-left: 25px;
  margin-right: 25px;
  text-decoration: none;
  font-size: 25px;
  color: grey;
  font-family: Arial, Helvetica, sans-serif;
}

.bouton:hover {
  margin-left: 25px;
  margin-right: 25px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  font-family: Arial, Helvetica, sans-serif;
  border-radius: 20px;
}

.logoaccueil{
    margin-left:80px;
    padding:10px;
}

.nav_buttons {
  display: flex;
}

.nav_icons {
  display: flex;
  align-items: center;
  margin-right: 80px;
}

.imgmsg {
  margin-left: 60px;
}
</style>
