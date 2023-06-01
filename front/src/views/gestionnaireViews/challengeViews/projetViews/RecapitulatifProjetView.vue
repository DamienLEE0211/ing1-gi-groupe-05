<template>
  <div
    :style="{ background: $vuetify.theme.themes.light.colors.primary }"
    style="flex-direction: column"
    class="d-flex"
  >
    <MenuHeader />

    <div style="display: flex; flex-direction: row;">


      <div>
      <h1 style="color: white; font-size: xxx-large; text-align: center; margin: 20px">{{ objetTest.title }}</h1>
      <div class="formCadre">
        <div class="description">
          <v-img :src="objetTest.lien"/>
          <div class="textDescription">
            <p class="text-overline">{{objetTest.type}}</p>
            <p class="text-body-1 my-4">{{objetTest.description}}</p>
            <v-btn rounded="xl" size="large" style="width: 40%; padding: 5px; margin: 40px auto" color="primary">Envoyer un message</v-btn>
          </div>
        </div>
      </div>
        <v-btn rounded="xl" size="large" style="width: 30%; padding: 5px; margin: 40px" color="white">Analyser le code du projet</v-btn>
      </div>
      <tabEquipe :data="objetTest.equipe"  style="width: 40%"/>
    </div>

    <Footer class="align-self-end" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import Footer from '../../../../components/Footer.vue'
import MenuHeader from '../../../../components/MenuHeader.vue'
import TabEquipe from '../../../../components/utilisateur/tabEquipe.vue'

// Components

export default defineComponent({
  name: 'RecapitulatifProjetView',

  components: {
    TabEquipe,
    Footer,
    MenuHeader
  },
  data() {
    return {
      objetTest: {
        title: 'Le projet du bonheur',
        lien: 'https://img.freepik.com/free-photo/space-background-realistic-starry-night-cosmos-shining-stars-milky-way-stardust-color-galaxy_1258-154643.jpg',
        idProjet: '846se45fez6cds',
        idChallenge: '486d4sq6fez6f',
        description:
          'Hoc dici quidem humanitatem hoc quasi sit omnes penitus ingeni Etenim ne continentur Etenim humanitatem aut commune neque quidem cognatione disciplina fuimus quasi penitus miretur quidem aut quasi uni dediti dicendi nos quasi penitus studio dicendi studio aut studio aut.',
        equipe: [
          {
            nom: 'Dupont',
            prenom: 'Bob',
            ecole: 'CY Tech',
            niveau: 'L3',
            ville: 'Pau',
            email: 'dupondbob@cy-tech.fr',
            capitaine: true
          },
          {
            nom: 'Dupond',
            prenom: 'Bob',
            ecole: 'CY Tech',
            niveau: 'L3',
            ville: 'Pau',
            email: 'dupondbob@cy-tech.fr'
          },
          {
            nom: 'Dupond',
            prenom: 'Bob',
            ecole: 'CY Tech',
            niveau: 'L3',
            ville: 'Pau',
            email: 'dupondbob@cy-tech.fr'
          },
          {
            nom: 'Dupond',
            prenom: 'Bob',
            ecole: 'CY Tech',
            niveau: 'L3',
            ville: 'Pau',
            email: 'dupondbob@cy-tech.fr'
          },
          {
            nom: 'Dupond',
            prenom: 'Bob',
            ecole: 'CY Tech',
            niveau: 'L3',
            ville: 'Pau',
            email: 'dupondbob@cy-tech.fr'
          }
        ]
      },
      event: Object
    }
  },
  mounted() {
    this.id = this.$route.params.event
    this.event = this.getEventInfo(this.id)
  },
  methods: {
    getEventInfo(id) {
      return this.objetTest
    }
  }
})
</script>