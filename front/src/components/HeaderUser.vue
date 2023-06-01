<script>
  export default  {
    data() {
      return {
        links: [
          {text: 'Accueil', url: 'acceuil.html'},
          {text: 'QCM', url: 'qcm.html'},
          {text: 'Data Challenge', url: 'datachallenge.html'}
        ],
        message: 'IA PAU - DATA CHALLENGE',
      }
    }
  }
</script>

<template>
  <nav id="top-nav">
    <img src="http://iapau.org/wp-content/uploads/2021/05/iapau_round.png" alt="Association IA Pau" id="logo">
    <ul id="top-list">
      <li v-for="(link, index) in links" :key="index" id="nav-items">
        <a :href="link.url">
          {{ link.text }}
        </a>
      </li>
    </ul>

    <div id="top-icon">
      <a href="connexion.html">
        <img id="connexion-icon" src="../..//img/connexion.png" alt="connexion">
      </a>
      <a href="message.html">
        <img id="message-icon" src="../../img/message.png" alt="message">
      </a>
    </div>
  </nav>
</template>

<style>
ul{
  list-style:none;
}

#top-list{
  display: flex;
}
#top-list a{
  font-size: 18px;
  text-decoration: none;
  color: inherit;
}

#top-list li{
  margin: 0 30px;
}

#logo {
  margin-left: 2em;
  padding-left: 2em;
  height: 50px;
}

#top-nav {
  display: flex;
  align-items: center;
  height: 7em;
  justify-content: space-between;

}

#top-icon {
  display: flex;

}
a{
  margin-right: 20px;
  align-items: center;
}
#top-icon a{
  margin-right: 20px;
  align-items: center;

}
#top-icon a:hover {
  opacity: 0.8;
}
#top-icon a:hover img {
  transform: scale(1.2);
}
.top-nav a:hover {
  background-color: #d8cbc4;
  color: black;
}

.top-nav a.active {
  background-color: #04AA6D;
  color: white;
}

#connexion-icon,#message-icon{
  width: 50px;
}

body,html {
  margin: 0;
  padding: 0;
  flex-grow: 1;
}


</style>