<template>
  <div>
    <div id="background">
      <MenuHeader></MenuHeader>
      <h1>Statistique générale</h1>
      <br>
      <div id="tableContainer">
        <table>
          <tr>
            <th>Nom</th>
            <th>Min</th>
            <th>Max</th>
            <th>Moyenne</th> 
          </tr>
          <tr v-for="item in data" :key="item.nom">
            <td>{{ item.nom }}</td>
            <td>{{ item.min }}</td>
            <td>{{ item.max }}</td>
            <td>{{ item.moyenne }}</td> 
          </tr>
        </table>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <Footer></Footer>
    </div>
  </div>
</template>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
 
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid black;
}

#background {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #0e8769;
  color: white;
}

#tableContainer {
  border-radius:10px;
  color: black;
  margin-top: 20px;
  width: 50%;
  margin: 20px;
  background-color: white;
}
</style>

<script>
import MenuHeader from '../../components/MenuHeader.vue' 
import Footer from '../../components/Footer.vue'
import { ref } from 'vue'
import Chart from 'chart.js/auto'

export default {
  components: {
    Footer,
    MenuHeader
  },
  data() {
    return {
      data: [
        {
          nom: 'MaxLigneFonction',
          min: 'Ligne 1, Colonne 2',
          max: 'Ligne 1, Colonne 3',
          moyenne: 'Ligne 1, Colonne 4'
        },
        {
          nom: 'minLigneFonction',
          min: 'Ligne 2, Colonne 2',
          max: 'Ligne 2, Colonne 3',
          moyenne: 'Ligne 2, Colonne 4'
        },
        {
          nom: 'AvgLigneFonction',
          min: 'Ligne 3, Colonne 2',
          max: 'Ligne 3, Colonne 3',
          moyenne: 'Ligne 3, Colonne 4'
        },
        {
          nom: 'nbLigne',
          min: 'Ligne 4, Colonne 2',
          max: 'Ligne 4, Colonne 3',
          moyenne: 'Ligne 4, Colonne 4'
        },
        {
          nom: 'nbFonction',
          min: 'Ligne 5, Colonne 2',
          max: 'Ligne 5, Colonne 3',
          moyenne: 'Ligne 5, Colonne 4'
        }
      ]
    }
  }
}
</script>
