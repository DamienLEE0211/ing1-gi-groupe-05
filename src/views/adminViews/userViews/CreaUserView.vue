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
            <label for="type_utilisateur">Type d'utilisateur: </label>
            <select
              class="taillecentrer"
              name="types"
              id="type_utilisateur"
              required
              v-model="selectionne"
              title="Choisir un type d'utilisateur"
              autofocus
            >
              <option value="" disabled selected>--Choisir une option--</option>
              <option value="administrateur">Administrateur</option>
              <option id="g" value="gestionnaire">Gestionnaire</option>
              <option value="participant">Participant</option>
            </select>
          </div>
          <div class="champ">
            <label for="nom_utilisateur">Nom:</label>
            <input
              type="text"
              name="nom"
              id="nom_utilisateur"
              pattern="[a-zA-ZàâæçéèêëîïôùûüÿÀÂÉ-]+"
              required
              title="Ecrire un nom composé de lettres seulement"
            />
          </div>
          <div class="champ">
            <label for="prenom_utilisateur">Prénom:</label>
            <input
              type="text"
              name="prenom"
              id="prenom_utilisateur"
              pattern="[a-zA-ZàâæçéèêëîïôùûüÿÀÂÉ-]+"
              required
              title="Ecrire un prénom composé de lettres seulement"
            />
          </div>
          <div class="champ">
            <label for="entreprise">Nom d'entreprise:</label>
            <input
              type="text"
              name="entreprise"
              id="entreprise"
              pattern="[a-zA-Z]+"
              required
              title="Ecrire le nom d'entreprise avec des lettres seulement"
            />
          </div>
          <div class="champ">
            <label for="telephone">N° Téléphone:</label>
            <input
              type="tel"
              name="telephone"
              id="telephone"
              placeholder="0XXXXXXXXX"
              pattern="(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{8}"
              required
              title="Format N° Téléphone: 0XXXXXXXXX (10 chiffres)"
            />
          </div>
          <div class="champ">
            <label for="email">E-mail:</label>
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Example@domaine.com"
              pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})"
              required
              size="15"
              title="Format E-mail: Example@domaine.com"
            />
          </div>
          <div class="champ">
            <label for="mdp">Mot de passe:</label>
            <input
              type="password"
              name="mdp"
              id="mdp"
              required
              minlength="8"
              title="Mot de passe de 8 caractères minimum"
              @keyup="verifier_mdp()"
            />
          </div>
          <div class="champ">
            <label for="confirm_mdp" id="c_mdp">Confirmer le mot de passe:</label>
            <input
              type="password"
              name="confirm_mdp"
              id="confirm_mdp"
              required
              minlength="8"
              title="Mot de passe de 8 caractères minimum"
              @keyup="verifier_mdp()"
            />
            <p class="msgerreur" id="msgerreur"></p>
          </div>
          <div class="champ" v-bind:id="selectionne" v-if="selectionne === 'gestionnaire'">
            <label for="date_debut">Date d'activation:</label>
            <input class="date" type="date" name="date_debut" id="date_debut" required />
            <p class="msgerreur" id="erreur1"></p>
          </div>
          <div class="champ" v-bind:id="selectionne" v-if="selectionne === 'gestionnaire'">
            <label for="date_fin">Date de désactivation:</label>
            <input class="date" type="date" name="date_fin" id="date_fin" required />
            <p class="msgerreur" id="erreur2"></p>
          </div>
          <p class="msgerreurdate" id="erreur3"></p>
          <hr class="ligne" />
          <div class="envoi">
            <v-btn
              class="bouton_envoi"
              type="submit"
              @click="verifier_form('Le formulaire n\'a pas pu être envoyé', $event)"
            >
              Créer un utilisateur
            </v-btn>
          </div>
        </form>
      </div>
    </div>
    <FooterVue></FooterVue>
  </div>
</template>
<script>
import HeaderVue from "@/components/HeaderVue.vue";
import FooterVue from "@/components/FooterVue.vue";

export default {   
  data() {
    return {
      form_title: 'Créer un utilisateur',
      selectionne: '',
      uncomplete: true
    }
  },
  components:{
    HeaderVue,
    FooterVue
  },
  methods: {
    verifier_mdp: function () {
      let mdp = document.getElementById('mdp')
      let mdp_c = document.getElementById('confirm_mdp')
      let message = document.getElementById('msgerreur')
      if (mdp.value != mdp_c.value && mdp_c.value != '') {
        message.textContent = 'Les deux mots de passe sont différents !'
        mdp_c.style.border = '3px outset red'
      } else {
        document.getElementById('c_mdp').style.color = 'black'
        message.textContent = ''
        mdp_c.style.border = ''
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
      }
    },
    verifier_form: function (message_erreur, event) {
      //Verification mot de passe
      let mdp = document.getElementById('mdp')
      let mdp_c = document.getElementById('confirm_mdp')
      let message = document.getElementById('msgerreur')
      let select = document.getElementById('type_utilisateur')
      if (mdp.value != mdp_c.value) {
        message.textContent = 'Les deux mots de passe sont différents !'
        mdp_c.style.border = '3px outset red'
        if (typeof event.cancelable !== 'boolean' || event.cancelable) {
          event.preventDefault()
        }
        console.log(message_erreur)
        mdp.value = ''
        mdp_c.value = ''
        mdp.focus()
      } else {
        document.getElementById('c_mdp').style.color = 'black'
        message.textContent = ''
        mdp_c.style.border = ''
      }
      //Verification dates
      if (select.value == 'gestionnaire') {
        let date_deb = document.getElementById('date_debut')
        let date_fin = document.getElementById('date_fin')
        let message = document.getElementById('erreur3')
        if (date_deb.value != '') {
          this.verifier_date('date_debut', 'erreur1', event)
        }
        if (date_fin.value != '') {
          this.verifier_date('date_fin', 'erreur2', event)
        }
        let valeurdate1 = new Date(date_deb.value)
        let valeurdate2 = new Date(date_fin.value)
        let ecart = valeurdate2 - valeurdate1
        let ecartvalide = ecart > 0 ? true : false
        if (ecartvalide) {
          message.textContent = ''
        } else if (date_deb.value != '' && date_fin.value != '') {
          message.textContent =
            "La date de désactivation doit être postérieure à la date d'activation."
          console.log('message_erreur')
          if (typeof event.cancelable !== 'boolean' || event.cancelable) {
            event.preventDefault()
          }
        }
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
  margin-left: 0px;
  text-align: center;
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

div > label {
  display: inline-block; /* On choisit cette disposition pour donner une width a chaque label et ainsi pouvoir les aligner à droite*/
  width: 420px;
  text-align: right;
}

.date {
  text-align: center;
  width: 382px;
}

.ligne {
  width: 100%;
}

.bouton_envoi {
  padding: 10px;
  font-size: 30px;
  border-radius: 10px;
  color: white;
  background-color: #0e8769;
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