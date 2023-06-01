<template>

      <v-card
        class="mx-auto px-6 py-8 my-6" width="30%" elevation="5"
      >

        <p class="text-h3 ma-3" style="margin: 0 auto; text-align: center">Inscription</p>
        <v-form
          v-model="form"
          @submit.prevent="onSubmit"
        >
          <v-text-field
            v-model="nom"
            color="primary"
            label="Nom"
            variant="underlined"
            :rules="nomRules"
          ></v-text-field>

          <v-text-field
            v-model="prenom"
            color="primary"
            label="Prénom"
            variant="underlined"
            :rules="nomRules"
          ></v-text-field>

          <v-text-field
            v-model="email"
            color="primary"
            label="Email"
            variant="underlined"
            type="email"
            :rules="emailRules"
          ></v-text-field>

          <v-text-field
            v-model="ecole"
            color="primary"
            label="Ecole"
            variant="underlined"
            :rules="ecoleRules"
          ></v-text-field>

          <v-autocomplete
            label="Niveau"
            :items="['L1', 'L2', 'L3', 'M1', 'M2', 'D']"
            variant="underlined"
            :rules="[required]"
          ></v-autocomplete>

          <v-text-field
            v-model="ville"
            color="primary"
            label="Ville"
            variant="underlined"
            :rules="nomRules"
          ></v-text-field>

          <v-text-field
            v-model="password"
            color="primary"
            label="Mot de passe"
            placeholder="Entrer votre mot de passe"
            variant="underlined"
            :rules="mdpRules"
            :type="show1 ? 'text' : 'password'"
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="show1 = !show1"
          ></v-text-field>

          <v-text-field
            v-model="confPassword"
            color="primary"
            label="Confirmation mot de passe"
            placeholder="Confirmer votre mot de passe"
            variant="underlined"
            :rules="[egalMdp]"
            :type="show2 ? 'text' : 'password'"
            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="show2 = !show2"
          ></v-text-field>

        </v-form>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn color="primary" type="submit" :disabled="!form">
            Valider l'inscription

            <v-icon icon="mdi-chevron-right" end></v-icon>
          </v-btn>
        </v-card-actions>
      </v-card>
</template>
<script>
export default {
  data: () => ({
    form: false,
    nom: null,
    prenom: null,
    email: null,
    ville: null,
    password: null,
    confPassword: null,
    show1: false,
    show2: false,
    nomRules: [
      value => {
        if (value?.length >= 1 && /^[A-Za-z]+$/.test(value)) return true

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
  }),
  methods: {
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
    }
  },
}
</script>
