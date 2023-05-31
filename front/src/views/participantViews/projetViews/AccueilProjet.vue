<template>
  <div class="P1-mid">
    <div id="P1-midtop">
      <div id="first-block">
        <div id="img-block">
          <img :src="project1.image" alt="Image projet">
        </div>

        <div id="ressources">
          <h2>Ressources:</h2>
          <a v-for="(lien, index) in liens" :key="index" :href="lien.url">{{ lien.label }}</a>
        </div>
      </div>

      <div id="second-block">
        <h1 id="text-projet">Nom projet</h1>
        <p id="description">Description du projet</p>
        <button id="BTN-question" @click="buttonClicked('Questionnaires')">Questionnaires</button>
      </div>
      <div id="third-block">
        <div id="inside-third-block">
          <h1 id="contact">Contact</h1>
          <button id="BTN-message" @click="buttonClicked('Message')">Message</button>
          <h1>Equipe</h1>
          <p v-if="userRole === 1">nom capitaine</p>
          <ul id="coequipe-list">
            <li v-for="(coequipe, index) in coequipes" :key="index">
              {{ coequipe }}
            </li>
          </ul>
          <button v-if="userRole === 1" id="BTN-invitation" @click="buttonClicked('Inviter')">Inviter</button>
          <a v-if="userRole === 1" id="supp-team" href="">supprimer l'équipe</a>
        </div>
      </div>
    </div>
    <div id="P1-midBot">
      <div id="lien-code">
        <p>Lien hébergement du code (gitlab):</p>
        <div id="lien-git">
          <a href="http://www.github.com">git</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      userRole :0,

      project1: {
        image: "path/to/image.jpg",
        name: "Nom",
        dates: "Dates"
      },

      coequipes: [
        "coéquipé 2",
        "coéquipé 3"
      ],
      liens: [
        { label: "lien 1", url: "" },
        { label: "lien 2", url: "" },
        { label: "lien 3", url: "" },
        { label: "lien 4", url: "" },
      ],
    };
  },
  methods: {
    buttonClicked(action) {
      console.log(action + " button clicked!");
    },
  },
};
</script>

<style>
.P1-mid{
  gap: 0;
  background-color: #0E8769;
  height: 100vh;

}
#P1-midtop{
  height: 80%;
  justify-content: space-between;
  display: flex;
}
#P1-midBot{
  height: 20%;
}
#first-block{
  background-color: #0E8769;
  display: block;
  width: 15%;
  height: 70%;
  margin-left: 3%;
}
#second-block {
  margin-top: 2em;
  background-color: #0E8769;
  display: block;
  width: 15%;
  height: 70%;
  justify-content: center;
  justify-items: center;
  position: relative;
}
#BTN-question{
  width: 80%;
  margin-right: 0;
  border-radius: 10px;
  height: 3em;
  border-color: inherit;
  position: absolute;
  bottom: 0;
}

#third-block{
  margin-top: 2em;
  background-color: #B2D3C2;
  width: 15%;
  margin-right: 3%;
  height: 70%;
  justify-content: center;
  align-items: center;
  display: flex;
}


#img-block{
  background-color: #D3D4D9;
  margin-top: 2em;
  height: 20%;
  display: flex;
  justify-content: center;
  align-items: center;
}

#ressources{
  border-radius: 30px;
  margin-top: 4em;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #B2D3C2;
  height: 60%;
}

#ressources a {
  display: block;
  margin-bottom: 10px;
  color: inherit;
  text-decoration: none;
  margin-right: 0;
}
#ressources a:hover {
  color: #B9B6B7;
}

#text-projet, #description{
  color: white;
}

#inside-third-block{
  background-color: white;
  height: 98%;
  width: 100%;
  padding-top: 5%;
  clip-path: polygon(0 2%, 100% 0%, 100% 98%, 0% 100%);
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}

#contact{
  margin-top: 0;
}

#BTN-message,#BTN-invitation{
  margin-right: 0;
  background-color: #0E8769;
  width: 70%;
  height: 3em;
  border-radius: 10px;
  color: white;
  border-color: inherit;
}

#supp-team{
  margin-top: 1em;
  margin-right: 0;
}

#lien-code{
  width: 60%;
  height: 80%;
  background-color: white;
  border-radius: 10px;
  margin-left: 3%;
  text-align: center;
  align-items: center;
  justify-content: center;
  justify-items: center;
}
#lien-code p{
  padding-top: 1em;
  font-size: 20px;
}
#lien-git{
  height: 30%;
  width: 100%;
  background-color: #B2D3C2;
  margin-right: 0;
  align-items: center;
}
</style>