<template>
  <div>
    <HeaderVue></HeaderVue>
    <div class="milieu_f_u">
      <div class="formulaire_display">
        <div class="titre1">
          <h1>{{ form_title }}</h1>
          <img
            class="imgform"
            src="@/assets/logospagesadmin/Formulaire.png"
            alt="Photo de formulaire"
            id="imgform"
            width="50"
          />
        </div>
        <hr />
        <form class="formulaire">
          <div class="champ">
            <label for="libelle_dc">Libellé:</label>
            <input
              type="text"
              name="libelle"
              id="libelle_dc"
              pattern="[a-zA-ZàâæçéèêëîïôùûüÿÀÂÉ-]+"
              required
              title="Ecrire un libellé composé de lettres seulement"
              autofocus
            />
          </div>
          <div class="champ">
            <label for="date_debut">Début:</label>
            <input
              class="date"
              type="date"
              name="date_debut"
              id="date_debut"
              required
              title="Entrer une date valide"
            />
            <p class="msgerreur" id="erreur1_dc"></p>
          </div>
          <div class="champ">
            <label for="date_fin">Fin:</label>
            <input
              class="date"
              type="date"
              name="date_fin"
              id="date_fin"
              required
              title="Entrer une date valide, postérieure à la date de début"
            />
            <p class="msgerreur" id="erreur2_dc"></p>
          </div>
          <p class="msgerreurdate" id="erreur3_dc"></p>
          <div class="actions">
            <v-btn type="button" title="Voir la liste des projets rattachés au data challenge">
              Voir les projet associés
            </v-btn>
            <v-btn type="button" title="Générer une page HTML récapitulative">
              Générer un récapitulatif
            </v-btn>
          </div>
          <div class="gauche">
            <label class="ressources" for="liste_ressources">Ajouter une ressource</label>
            <input
              id="liste_ressources"
              class="button_style"
              type="file"
              title="Ajouter une ressource standard à la liste"
              multiple
            />
            <v-btn
              class="decalage"
              type="button"
              title="Voir tout les liens ressources"
              @click="reveler_liste_ressources()"
            >
              {{ texte_bouton }}
            </v-btn>
          </div>
          <ul v-if="liste_revelee">
            <li class="listestyle">Fichiers sélectionnés:</li>
            <li class="listestyle">{{ test }}</li>
          </ul>
          <hr />
          <div class="envoi">
            <v-btn
              class="bouton_envoi"
              type="submit"
              @click="verifier_form('Le formulaire n\'a pas pu être envoyé', $event)"
            >
              Créer un Data Challenge
            </v-btn>
          </div>
        </form>
      </div>
    </div>
    <FooterVue></FooterVue>
  </div>
</template>
<script>
import HeaderVue from '@/components/HeaderVue.vue'
import FooterVue from '@/components/FooterVue.vue'

export default {
  data() {
    return {
      form_title: 'Créer un Data Challenge',
      selectionne: '',
      uncomplete: true,
      liste_revelee: false,
      test: {},
      textes: {
        faux: 'Voir les ressources',
        vrai: 'Cacher les ressources'
      },
      texte_bouton: 'Voir les ressources'
    }
  },
  props:['id'],
  components: {
    HeaderVue,
    FooterVue
  },
  methods: {
    //test: function {},
    //axios.get("http://127.0.0.1:8000/api/users").then(response => (this.info = response))
    reveler_liste_ressources: function () {
      let form = new FormData()
      for (var entryForm of form.entries()) {
        console.log(entryForm[0], entryForm[1])
      }
      if (this.liste_revelee === false) {
        this.liste_revelee = true
        this.texte_bouton = this.textes.vrai
        this.test = form
      } else {
        this.liste_revelee = false
        this.texte_bouton = this.textes.faux
      }
    },
    verifier_date: function (date_id, error_id, event) {
      let date = document.getElementById(`${date_id}`)
      let message = document.getElementById(`${error_id}`)
      let valeurdate = new Date(date.value)
      const current_day = new Date(Date.now())
      let diff1 = valeurdate - current_day
      let dateValide = diff1 > 0 ? true : false
      if (dateValide) {
        message.textContent = ''
        date.style.border = ''
      } else {
        message.textContent = 'La valeur saisie est invalide !'
        date.style.border = '3px outset red'
        if (typeof event.cancelable !== 'boolean' || event.cancelable) {
          event.preventDefault()
        }
        console.log('Date entrée invalide')
      }
    },
    verifier_form: function (message_erreur, event) {
      //Verification dates
      let date_deb = document.getElementById('date_debut')
      let date_fin = document.getElementById('date_fin')
      let message = document.getElementById('erreur3_dc')
      if (date_deb.value != '') {
        this.verifier_date('date_debut', 'erreur1_dc', event)
      }
      if (date_fin.value != '') {
        this.verifier_date('date_fin', 'erreur2_dc', event)
      }
      let valeurdate1 = new Date(date_deb.value)
      let valeurdate2 = new Date(date_fin.value)
      let ecart = valeurdate2 - valeurdate1
      let ecartvalide = ecart > 0 ? true : false
      if (ecartvalide) {
        message.textContent = ''
      } else if (date_deb.value != '' && date_fin.value != '') {
        message.textContent =
          'La fin du data challenge est postérieure au début de ce data challenge.'
        if (typeof event.cancelable !== 'boolean' || event.cancelable) {
          event.preventDefault()
        }
        console.log(message_erreur)
      }
    }
  }
}
</script>

<style>
.milieu_f_u {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-top: 140px; /*100px de la taille de l'entête + 2*20px de padding de l'entête*/
  background-color: #0e8769;
}

.formulaire_display {
  min-width: 900px;
  width: 900px;
  background-color: white;
  height: auto;
  padding-bottom: 30px;
  border-radius: 20px;
  margin: 20px auto;
}

.titre1 {
  display: flex;
  align-items: center;
  justify-content: center;
}

.imgform {
  margin-left: 20px;
}

.formulaire {
  margin-top: 20px;
  margin-left: 0;
  text-align: center;
}

.actions {
  margin-top: 50px;
  display: flex;
  justify-content: left;
}

.champ {
  font-size: 30px;
  margin-top: 10px;
}

.taillecentrer {
  font-size: 30px;
  text-align: center;
  width: 390px;
}

label ~ input {
  font-size: 30px;
  width: 382px;
}

div.champ > label {
  display: inline-block; /* On choisit cette disposition pour donner une width a chaque label et ainsi pouvoir les aligner à droite*/
  width: 420px;
  text-align: right;
}

.date {
  text-align: center;
  width: 382px;
}

.bouton_envoi {
  padding: 10px;
  font-size: 30px;
  border-radius: 10px;
  color: white;
  background-color: #0e8769;
}

.bouton_envoi:hover {
  padding: 10px;
  font-size: 30px;
  border-radius: 10px;
  cursor: pointer;
}

.bouton_redirection {
  padding: 10px;
  font-size: 30px;
  border-radius: 10px;
}

div > button {
  padding: 10px;
  font-size: 20px;
  border-radius: 10px;
  margin-left: 10px;
}

.gauche {
  text-align: left;
  margin-top: 10px;
  margin-bottom: 20px;
}

.ressources {
  margin-top: 10px;
  font-size: 20px;
  text-align: left;
  width: 225px;
  margin-left: 10px;
}

.ressources:hover {
  margin-top: 10px;
  font-size: 20px;
  text-align: left;
  width: 225px;
  cursor: pointer;
  color: grey;
}

.decalage {
  margin-left: 15px;
  width: 243px;
}

.button_style {
  display: none;
}

.listestyle {
  text-align: left;
  list-style-type: none;
}

.envoi {
  text-align: center;
  margin-top: 30px;
}

.msgerreur {
  font-size: 13px;
  color: red;
  margin-left: 52%;
  margin-top: 0;
  text-align: left;
}

.msgerreurdate {
  font-size: 20px;
  color: red;
  text-align: center;
}
</style>