<script>
export default {
  data() {
    return {
      links: [
        {text: 'Accueil', url: 'acceuil.html'},
        {text: 'QCM', url: 'qcm.html'},
        {text: 'Data Challenge', url: 'datachallenge.html'}
      ],
      firstName: 'Prénom',
      lastName: 'Nom',
      username: 'Utilisateur',
      school: 'Ecole / Entreprise',
    }
  },
  methods: {
    buttonClicked() {
      alert('Button clicked!');
    }
  },

};


</script>

<template>
  <span id="containers">
        <h1 id="info-perso">Informations personnelles</h1>
        <div id="info-user">
          <p>{{ firstName }}</p>
          <p>{{ lastName }}</p>
          <p>{{ username }}</p>
        </div>

        <div id="info-ecole">
          <p>{{ school }}</p>
        </div>

        <div id="div-btn">
          <button id="BTN-modif-info" @click="buttonClicked">Modifier les informations</button>
          <button id="BTN-cherche-chall" @click="buttonClicked">Chercher un challenge</button>
        </div>
  </span>
</template>

<style>
  #containers{
    width: 100%;
    margin-left: 4em;
  }
  #info-perso{
    color: white;
  }
  #info-user{
    display: flex;
    color: white;
    font-size: 18px;
  }
  #info-user p{
    margin-right: 1em;
  }

  #info-ecole{
    color: white;
    font-size: 18px;
  }
  button{
    margin-right: 2em;
  }
  #BTN-modif-info,#BTN-cherche-chall{

    background-color: #B2D3C2;
    color: white;
    font-size: 18px;
    padding: 10px 20px ;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 250px;
    margin-top: 4em;
    transform: translate(0, -80%);
  }
</style>