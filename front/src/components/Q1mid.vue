<script>
export default {
  data() {
    return {
      teams: ["nom équipe 1", "nom équipe 2", "nom équipe 3"],
    };
  },
};
</script>

<template>
  <div class="Q1-mid">
    <div id="container-classement">
      <h1>Classement</h1>
      <h2 v-for="(team, index) in teams" :key="index">{{ index + 1 }}- {{ team }}</h2>
    </div>
  </div>

</template>

<style>
.Q1-mid{
  gap: 0;
  background-color: #0E8769;
  height: 100vh;
  text-align: center;
  justify-items: center;
}
#container-classement{
  width: 100%;
  height: 60%;
  color: white;
  padding-top: 4em;
}
#container-classement h1,h2{
  margin-bottom: 1em;
}
</style>