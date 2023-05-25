<template>
  <select name="name" size="5">
    <option v-for="elem in listElem" :key="elem.item.title" value="elem.item.title">{{elem.item.title}}</option>
  </select>
</template>

<style>

</style>

<script>
export default {

  name: 'SelectName',
  props: {
    list: Array
  },
  data() {
    return {
      listElem: this.list
    }
  }

}
</script>