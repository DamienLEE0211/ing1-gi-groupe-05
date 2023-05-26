<script>
export default {
  data() {
    return {

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
        }
      }

};

</script>

<template>
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
</template>

<style>
#second-mid{
  background-color: #B2D3C2;
  height: 50%;
  width: 80%;
}

#div-project{
  text-align: center;
  margin-top: -1%;
  background-color: white;
  height: 100%;
  width: 100%;

  margin-left: 2%;
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