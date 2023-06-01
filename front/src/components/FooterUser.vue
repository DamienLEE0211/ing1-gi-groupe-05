<script>
export default  {
  data() {
    return {
      webmasters: [
        { id: 1, name: "L'association", fontSize: 18 },
        { id: 2, name: "Des question?", fontSize: 18 },
        { id: 3, name: 'Nous contacter', fontSize: 18 }
      ]
    }
  },
  methods: {
    buttonClicked() {
      alert('Button clicked!');
    }
  },
}
</script>

<template>
  <div id="footer">
    <h2>#IAPAU</h2>
    <div id="footer-links">
      <a v-for="webmaster in webmasters" :key="webmaster.id" :style="{ fontSize: webmaster.fontSize + 'px' }">{{ webmaster.name }}</a>
    </div>
  </div>
</template>

<style>

#footer {
  padding:30px;
  background-color:white;
  height: 100px;
  clear: both;
  text-align: center;
  margin-bottom: 0;
}
a{
  margin-right: 20px;
  align-items: center;
}
</style>