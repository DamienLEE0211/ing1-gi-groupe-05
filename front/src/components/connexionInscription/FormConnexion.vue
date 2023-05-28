<template>

    <v-card class="mx-auto px-6 py-8 my-6" width="30%" elevation="5">
      <p class="text-h3 ma-3" style="margin: 0 auto; text-align: center">Connexion</p>
      <v-form
        v-model="form"
        @submit.prevent="onSubmit"
      >
        <v-text-field
          v-model="email"
          :readonly="loading"
          :rules="emailRules"
          class="mb-2"
          clearable
          label="Email"
          type="email"
        ></v-text-field>

        <v-text-field
          v-model="password"
          :readonly="loading"
          :rules="mdpRules"
          clearable
          label="Password"
          placeholder="Enter your password"
          type="password"
        ></v-text-field>

        <br>

        <v-btn
          :disabled="!form"
          :loading="loading"
          block
          color="primary"
          size="large"
          type="submit"
          variant="elevated"
        >
          Se connecter
        </v-btn>
      </v-form>
      <p class="text-h5 ma-5" style="margin: 0 auto; text-align: center">ou</p>
      <p class="text-h3 ma-3" style="margin: 0 auto; text-align: center">Inscription</p>
      <v-btn
        block
        color="primary"
        size="large"
        variant="elevated"
        to="/inscription"
      >
        S'inscrire
      </v-btn>
    </v-card>
</template>
<script>
export default {
  name: "FormConnexion",
  data: () => ({
    form: false,
    email: null,
    password: null,
    loading: false,
    emailRules: [
      value => {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) return true

        return 'Le format de l\'adresse mail est invalide'
      },
    ],
    mdpRules: [
      value => {
        if (value?.length >= 5) return true

        return 'Le mot de passe est de minimum 5 caractères.'
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
  },
}
</script>