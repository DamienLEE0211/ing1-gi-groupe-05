<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />
    <ImageTitre />;
    <h1 style="color: white; text-align: center; margin: 20px; font-size: xxx-large">
      Règlement et déroulé d'un data challenge
    </h1>
    <div style="text-align: center; margin: 20px auto; color: white; text-align: center; width: 80%">

      <b>C’est quoi un Data Challenge ?</b> <br> <br>

      La rencontre entre d’une part une entreprise avec une problématique et un jeu de données, et d’autre part plusieurs équipes d’étudiants de toute la francophonie qui s’affrontent sous la tutelle des experts en data science de l’organisation. <br> <br>

      <b>Pour quelle durée ?</b> <br> <br>

      Vous pouvez participer à des data challenges sur-mesure d’un mois. <br> <br>

      <b>Comment se passe l’organisation ?</b> <br> <br>

      Le porteur industriel pitche le projet sur place ou en vidéo : présentation des données et des objectifs. Les étudiants constituent des équipes de 4-6 personnes aux profils complémentaires (maths, info, design). Un jury composé d’entrepreneurs, de chercheurs et d’ingénieurs sélectionne l’équipe gagnante.<br> <br>

      <b>Et après le Data Challenge ?</b> <br> <br>

      Le projet continue après le challenge : stage, projet de fin d’étude, embauche, et bientôt des créations d’entreprises.

    </div>

    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

// Components
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'
import ImageTitre from '../../components/accueilComponents/ImageTitre.vue'

export default defineComponent({
  name: 'RegleDataChallenge',

  components: {
    ImageTitre,
    Footer,
    MenuHeader
  }
})
</script>