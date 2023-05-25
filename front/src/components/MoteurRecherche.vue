<template>
  <input type="text" v-model="rech"><br>
  <SelectName v-bind:list="result" />
</template>

<style>
</style>


<script>
  //commande installation: npm install --save fuse.js
  import Fuse from "fuse.js"
  import SelectName from "@/components/SelectName.vue";

  export default {

  name: 'MoteurRecherche',
    components: {SelectName},
  data() {
    return {
      rech: '',
      result: [],
    }
  },
  watch: {
    rech(oldResult, newResult) {
      const result = recherche(newResult);
      console.log(result);
    }
  },
  methods(){

  }
}

function recherche(input){
  const books = [
    {
      title: "Old Man's War",
      author: {
        firstName: 'John',
        lastName: 'Scalzi'
      }
    },
    {
      title: 'The Lock Artist',
      author: {
        firstName: 'Steve',
        lastName: 'Hamilton'
      }
    }
  ]

// 2. Set up the Fuse instance
  const fuse = new Fuse(books, {
    keys: ['title', 'author.firstName']
  })

// 3. Now search!
  return fuse.search(input);
}

</script>