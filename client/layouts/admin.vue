<template>
  <v-app>
    <v-content>
      <nav-bar />
      <nuxt />
    </v-content>
  </v-app>
</template>
<script>
import NavBar from '@/components/admin/NavBar.vue'
export default {
  components: {
    NavBar
  },
  data() {
    return {
      //
    }
  }
}
</script>
<style></style>
