<template>
  <div id="mid">
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

    <div id="second-mid">
      <div id="div-project">
        <p id="txt-mes-projets">Mes projets</p>
        <div id="Three-box-contains">
          <div class="each-project">
            <img :src="project1.image" alt="Image projet">
            <p>{{ project1.name }}</p>
            <p>{{ project1.dates }}</p>
          </div>
          <div class="each-project">
            <img :src="project2.image" alt="Image projet">
            <p>{{ project2.name }}</p>
            <p>{{ project2.dates }}</p>
          </div>
          <div class="each-project">
            <p>{{ challengeText }}</p>
          </div>
        </div>
      </div>
    </div>

  </div>
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

#second-mid{
  background-color: #B2D3C2;
  height: 50%;
  width: 80%;
}
#txt-mes-projets{
  margin: 0;
  padding-top: 1em;
}

#div-project{
  text-align: center;
  background-color: white;
  height: 100%;
  width: 100%;
  clip-path: polygon(0 3%, 100% 0%, 100% 97%, 0% 100%);
}

#txt-mes-projets{
  font-size: 30px;
  font-weight: bold;
}

#Three-box-contains{
  padding-left: 5em;
  padding-right: 5em;
  margin-top: 3em;
  display: flex;
  justify-content: space-between;
  justify-items: center;
}
.each-project{
  padding-top: 1em;
  justify-items: center;
  width: 10em;
  height: 15em;
  background-color: #B2D3C2;
  display: block;
}
</style>
<script>
Vue.createApp({
  data() {
    return {

      firstName: 'Prénom',
      lastName: 'Nom',
      username: 'Utilisateur',
      school: 'Ecole / Entreprise',

      project1: {
        image: "", // Provide the image source
        name: "Nom", // Replace with the actual name
        dates: "Dates" // Replace with the actual dates
      },
      project2: {
        image: "", // Provide the image source
        name: "Nom", // Replace with the actual name
        dates: "Dates" // Replace with the actual dates
      },
      challengeText: "S'inscrire à nouvelle challenge",


    };
  },
  methods: {
    buttonClicked() {
      alert('Button clicked!');
    }
  },
}).mount('body');
</script>