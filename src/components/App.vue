<template>
  <div>
    <HeaderVue></HeaderVue>
    <router-view/>
    <FooterVue></FooterVue>
  </div>
</template>

<script>
import HeaderVue from "./HeaderVue.vue";
import FooterVue from "./FooterVue.vue";

export default {
  name: "App",
  components: {
    HeaderVue,
    FooterVue
  },
};
</script>

<style>
.milieu{
  width:100%;                                                                /*Pour coller le corps tout à droite (right -y px ne peux pas fonctionner avec left -y px)*/
  margin-top: 140px;                                                         /*100px de la taille de l'entête + 2*20px de padding de l'entête*/
  background-color:#0e8769;
  height:1000px;    
}
html,body{
  margin:0;
}
</style>
