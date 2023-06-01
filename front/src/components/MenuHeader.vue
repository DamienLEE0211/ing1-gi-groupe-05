<template>

  <v-app-bar id="menu" elevation="100" color="white" :density="dens">

    <template v-slot:prepend>
      <v-img :src=logoIaPau alt="IA Pau"  height="80%" max-width="25%"/>
    </template>

    <template v-slot:append>
      <v-btn size="x-large" @click="this.$router.push('/')">Accueil</v-btn>

      <v-btn size="x-large" @click="this.$router.push('/data-challenges')">Data challenges</v-btn>

      <v-btn size="x-large" @click="this.$router.push('/data-battles')">Data battle</v-btn>

      <v-btn value="Connexion" color="primary" variant="elevated" mx="12" size="x-large" @click="connecte">Mon compte</v-btn>
    </template>
  </v-app-bar>
</template>

<style>
</style>

<script>
export default {
  name: 'MenuHeader',
  data() {
    return {
      value: 1,
      dens: "prominent",
      isAuthenticated: false
    }
  },
  methods: {
    handleScroll (event) {
      if (!(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80)) {
        this.dens = "prominent";
      } else {
        this.dens = "default";
      }
    },
    connecte() {
      if (this.isAuthenticated) {
        this.$router.push('/participant/:id')
      } else {
        this.$router.push('/connexion')
      }
    },
  },
  created () {
    window.addEventListener('scroll', this.handleScroll);
  },
  unmounted () {
    window.removeEventListener('scroll', this.handleScroll);
  },
}



</script>
<script setup>
import logoIaPau from '../assets/iapau_round.png'
</script>
