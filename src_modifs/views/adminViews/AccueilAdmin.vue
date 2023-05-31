<template>
  <div>
    <HeaderVue class="decalageheader"></HeaderVue>
    <div class="milieu">
      <div class="titre_categorie">
        <h1>Utilisateurs</h1>
      </div>
      <div class="barreselect">
        <div class="barre_recherche">
          <input
            type="text"
            name="barre_recherche"
            v-model="rechercher_user"
            placeholder="Rechercher un utilisateur"
          />
          <br />
          <br />
        </div>
        <v-select
          class="resize"
          label="Filtrer"
          :items="['Par Id','Par Type', 'Par Prénom', 'Par Nom', 'Par Entreprise', 'Désactivé']"
          variant="solo-filled"
          v-model="filtre_selectionne_user"
        ></v-select>
      </div>
      <v-table class="table" id="myTable">
        <thead>
          <tr>
            <th>#Id</th>
            <th>Type</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Entreprise</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="utilisateur in utilisateursfiltre" :key="utilisateur.id">
            <td>{{ utilisateur.id }}</td>
            <td>{{ utilisateur.type }}</td>
            <td>{{ utilisateur.prenom }}</td>
            <td>{{ utilisateur.nom }}</td>
            <td>{{ utilisateur.entreprise }}</td>
            <td><v-btn>Modifier</v-btn></td>
            <td><v-btn @click="supprimer_utilisateur(utilisateur.id)">Supprimer</v-btn></td>
          </tr>
        </tbody>
      </v-table>
      <br />
      <br />
      <div class="titre_categorie">
        <h1>Data Challenges</h1>
      </div>
      <div class="barreselect">
        <div class="barre_recherche">
          <input
            type="text"
            name="barre_recherche"
            v-model="rechercher_dc"
            placeholder="Rechercher un Data Challenge"
            title="Rechercher un Data Challenges"
          />
          <br />
          <br />
        </div>
        <v-select
          class="resize"
          label="Filtrer"
          :items="['Par Id', 'Par Libellé', 'Désactivé']"
          variant="solo-filled"
          v-model="filtre_selectionne_dc"
        ></v-select>
      </div>
      <v-table class="table" id="myTable">
        <thead>
          <tr>
            <th>#Id</th>
            <th>Libellé</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="dc in dcfiltre" :key="dc.id">
            <td>{{ dc.id }}</td>
            <td>{{ dc.libelle }}</td>
            <td><v-btn>Modifier</v-btn></td>
            <td><v-btn @click="supprimer_dc(dc.id)">Supprimer</v-btn></td>
          </tr>
        </tbody>
      </v-table>
    </div>
    <FooterVue></FooterVue>
  </div>
</template>

<script>
import HeaderVue from '@/components/HeaderVue.vue'
import FooterVue from '@/components/FooterVue.vue'

export default {
  name: 'Admin',
  props: ['id'],
  components: {
    HeaderVue,
    FooterVue
  },
  data() {
    return {
      rechercher_user: '',
      rechercher_dc: '',
      filtre_selectionne_user: 'Filtrer',
      filtre_selectionne_dc: 'Filtrer',
      utilisateurs: [
        { id: 1, type: 'Gestionnaire', prenom: 'Armand', nom: 'Dupont', entreprise: '' },
        { id: 2, type: 'Participant', prenom: 'Florent', nom: 'Lopez', entreprise: 'Amazon' },
        { id: 3, type: 'Participant', prenom: 'Julia', nom: 'Martin', entreprise: 'Tesla' },
        { id: 4, type: 'Gestionnaire', prenom: 'Amandine', nom: 'Garcia', entreprise: '' }
      ],
      data_challenges: [
        { id: 1, libelle: 'ChallJs' },
        { id: 2, libelle: 'ChallC++' },
        { id: 3, libelle: 'ChallPascal' }
      ]
    }
  },
  methods:{
    supprimer_utilisateur: function (index) {
      this.utilisateurs=this.utilisateurs.filter((u) => u.id != index)
    },
    supprimer_dc: function (index) {
      this.data_challenges=this.data_challenges.filter((dc) => dc.id != index)
    },
  },
  computed: {
    utilisateursfiltre: function () {
      return this.utilisateurs.filter((utilisateur) => {
        if (this.filtre_selectionne_user === 'Par Prénom') {
          return utilisateur.prenom.toLowerCase().indexOf(this.rechercher_user.toLowerCase()) !== -1
        } else if (this.filtre_selectionne_user === 'Par Id') {
          return utilisateur.id == this.rechercher_user
        } else if (this.filtre_selectionne_user === 'Par Nom') {
          return utilisateur.nom.toLowerCase().indexOf(this.rechercher_user.toLowerCase()) !== -1
        } else if (this.filtre_selectionne_user === 'Par Entreprise') {
          return (
            utilisateur.entreprise.toLowerCase().indexOf(this.rechercher_user.toLowerCase()) !== -1
          )
        } else if (this.filtre_selectionne_user === 'Par Type') {
          return utilisateur.type.toLowerCase().indexOf(this.rechercher_user.toLowerCase()) !== -1
        } else {
          return this.utilisateurs
        }
      })
    },
    dcfiltre: function () {
      return this.data_challenges.filter((challenge) => {
        if (this.filtre_selectionne_dc === 'Par Libellé') {
          return challenge.libelle.toLowerCase().indexOf(this.rechercher_dc.toLowerCase()) !== -1
        } else if (this.filtre_selectionne_dc === 'Par Id') {
          return challenge.id == this.rechercher_dc
        } else {
          return this.data_challenges
        }
      })
    }
  }
}
</script>

<style>
.milieu {
  width: 100%; /*Pour coller le corps tout à droite (right -y px ne peux pas fonctionner avec left -y px)*/
  margin-top: 140px; /*100px de la taille de l'entête + 2*20px de padding de l'entête*/
  background-color: #0e8769;
  height: 1000px;
}

.barre_recherche {
  display: flex;
}

.barreselect {
  display: flex;
  align-items: center;
}

.bg {
  background-color: white;
}

input[name='barre_recherche'] {
  background-color: white;
  margin-left: 10px;
  height: 56px;
  width: 220px;
  border: solid white;
  border-radius: 4px;
  margin-bottom: 22px;
}

.resize {
  margin-left: 10px;
}

.titre_categorie {
  height: 50px;
}

html,
body {
  margin: 0;
}
</style>
