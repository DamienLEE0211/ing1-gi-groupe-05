<script>
export default {
  data() {
    return {
      message: 'IA PAU - DATA CHALLENGE',
    }
  }
}

</script>

<template>
  <div id="mid" class="container">
    <span id="background-image"></span>
    <h1 id="H1-message">{{ message }}</h1>
    <button class="custom-button" @click="buttonClicked">Prochaine évenement</button>
  </div>
</template>

<style>
body,html {
  margin: 0;
  padding: 0;
  flex-grow: 1;
}

#background-image{
  background: url(../../img/pyrenees.png) center center / cover no-repeat fixed;
  width: 100%;
  height: 300px;
  position: absolute;

}
#H1-message{
  margin-top: 2em;
  color: white;
  transform: translate(0, -80%);
}


#mid{
  Display: flex;
  flex-direction: column;
  background-color: #0E8769;
  align-items: center;
  gap: 0;
  height: 100vh;
}

.custom-button {
  background-color: green;
  color: white;
  font-size: 18px;
  padding: 10px 20px ;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 250px;
  margin-top: 2em;
  transform: translate(0, -80%);

}
</style>