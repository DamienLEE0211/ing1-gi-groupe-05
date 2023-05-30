<script>

</script>

<template>
  <div class="P1-mid">
    <div id="P1-midtop">
      <div id="first-block">
        <div id="img-block">
          <img :src="project1.image" alt="Image projet">
        </div>

        <div id="ressources">
          <h2>Ressources : </h2>
          <a href="">lien 1</a>
          <a href="">lien 2</a>
          <a href="">lien 3</a>
          <a href="">lien 4</a>
        </div>
      </div>

      <div id="second-block">
        <h1 id="text-projet">Nom projet</h1>
        <p id="description">Description du projet</p>
        <button id="BTN-question" @click="buttonClicked">Questionaires</button>
      </div>
      <div id="third-block">
        <div id="inside-third-block">
          <h1 id="contact">Contact</h1>
          <button id="BTN-message" @click="buttonClicked">Message</button>
          <h1>Equipe</h1>
          <p>nom captitaine</p>
          <p>coéquipé 2</p>
          <p>coéquipé 3</p>

        </div>
      </div>
    </div>
  </div>
</template>

<style>

</style>