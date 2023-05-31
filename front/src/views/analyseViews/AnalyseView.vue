<template>
  <div class="about">
    <h1>Page avec le rendu de l'analyse [An1]</h1>
  </div>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
<script>
import { defineComponent } from 'vue'
import MenuHeader from '../../components/MenuHeader.vue'
import Footer from '../../components/Footer.vue'

export default defineComponent({
  components: { Footer, MenuHeader }
})
</script>