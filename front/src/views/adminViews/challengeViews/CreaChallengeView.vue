<template>
  <div
  :style="{ background: $vuetify.theme.themes.light.colors.primary }"
  style="flex-direction: column"
  class="d-flex"
  >
    <MenuHeader />
    <v-card
      class="mx-auto px-6 py-8 my-6" width="30%" elevation="5"
    >

      <p class="text-h3 ma-3" style="margin: 0 auto; text-align: center">Création d'un challenge</p>
      <v-form
        v-model="form"
        @submit.prevent="onSubmit"
      >
        <v-text-field
          v-model="nom"
          color="primary"
          label="Nom"
          variant="underlined"
          :rules="[required]"
        ></v-text-field>

        <v-textarea
          v-model="description"
          color="primary"
          label="Description"
          variant="underlined"
          :rules="[required]"
        ></v-textarea>

        <v-text-field
          v-model="imageUrl"
          color="primary"
          label="URL de l'image de présentation"
          variant="underlined"
          type="text"
          :rules="imagelienRule"
        ></v-text-field>

        <v-autocomplete
          label="type"
          :items="['Data challenge', 'Data battle']"
          variant="underlined"
          :rules="[required]"
        ></v-autocomplete>

        <v-text-field
          v-model="dateDebut"
          color="primary"
          label="Date de début"
          variant="underlined"
          :rules="[required]"
          type="date"
        ></v-text-field>

        <v-text-field
          v-model="dateFin"
          color="primary"
          label="Date de fin"
          variant="underlined"
          :rules="[required]"
          type="date"
        ></v-text-field>

        <v-divider class="my-5 border-opacity-0" :thickness="3"></v-divider>

        <p style="color: grey">Ressources</p>
        <v-text-field
          v-for="(_,index) in ressource" :key="index"
          v-model="ressource[index]"

          :append-icon="index === (ressource.length - 1)? 'mdi-plus' : ''"
          variant="filled"
          clearable
          label="URL de la ressource (image, fichier,...)"
          type="text"
          @click:append="modifI"
        ></v-text-field>

        <v-toolbar color="primary" class="mt-7">
          <v-toolbar-title>Responsable: </v-toolbar-title>

          <v-autocomplete
            v-model="responsable"
            v-model:search="search"
            :loading="loading"
            :items="items"
            class="mx-4"
            density="comfortable"
            hide-no-data
            hide-details
            label="Choissisez un gestionnaire"
            style="max-width: 300px;"
            :rules="[required]"
          ></v-autocomplete>
        </v-toolbar>

      </v-form>

      <v-divider></v-divider>

      <v-card-actions>
        <v-spacer></v-spacer>

        <v-btn color="primary" type="submit" :disabled="!form">
          Enregistrer

          <v-icon icon="mdi-chevron-right" end></v-icon>
        </v-btn>
      </v-card-actions>
    </v-card>

    <Footer />
  </div>
</template>

<style>

</style>
<script>
import MenuHeader from '../../../components/MenuHeader.vue'
import Footer from '../../../components/Footer.vue'
import { defineComponent } from "vue";
import BarRecherche from "../../../components/adminComponents/BarRecherche.vue";

export default defineComponent({
  components: {
    BarRecherche,
    MenuHeader,
    Footer
  },
  data: () => ({
    form: false,
    nom: null,
    description: null,
    imageUrl: null,
    type: null,
    dateDebut: null,
    dateFin: null,
    ressource: [null],

    show1: false,
    show2: false,
    imagelienRule: [
      value => {
        if (/\.(jpe?g|png|gif)$/i.test(value)) return true

        return 'La valeur doit contenir au moins un caractère et ne peut contenir que des lettres.'
      },
    ],
    ecoleRules: [
      value => {
        if (value?.length >= 1) return true

        return 'La valeur doit contenir au moins un caractère et ne peut contenir que des lettres.'
      },
    ],
    emailRules: [
      value => {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) return true

        return 'Le format de l\'adresse mail est invalide'
      },
    ],
    mdpRules: [
      value => {
        if (/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(value)) return true

        return 'Le mot de passe doit faire une taille minimum de 8 caractères et contenir au minimum une majuscule, une minuscule, un chiffre et un caractère spéciale.'
      },
    ],
    loading: false,
    items: [],
    search: null,
    select: null,
    states: [
      'Alabama',
      'Alaska',
      'American Samoa',
      'Arizona',
      'Arkansas',
      'California',
      'Colorado',
      'Connecticut',
      'Delaware',
      'District of Columbia',
      'Federated States of Micronesia',
      'Florida',
    ],
  }),
  watch: {
    search (val) {
      val && val !== this.select && this.querySelections(val)
    },
  },
  methods: {
  querySelections (v) {
    this.loading = true
    // Simulated ajax query
    setTimeout(() => {
      this.items = this.states.filter(e => {
        return (e || '').toLowerCase().indexOf((v || '').toLowerCase()) > -1
      })
      this.loading = false
    }, 500)
  },
    onSubmit () {
      if (!this.form) return

      this.loading = true

      setTimeout(() => (this.loading = false), 2000)
    },
    required (v) {
      return !!v || 'Field is required'
    },
    egalMdp(v) {
      if (v === this.password) {
        console.log(v +" / "+ this.password)
        return true
      }

      return 'La confirmation n\'est pas identique au mot de passe.'
    },
    modifI(){
       this.ressource.push(null);
       console.log(this.ressource);
    }
  }
})
</script>