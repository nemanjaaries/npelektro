<template>
  <v-app class="grey lighten-4">
    <nav-bar />
    <v-content class="mx-3">
      <nuxt />
    </v-content>
  </v-app>
</template>
<script>
import NavBar from '@/components/admin/NavBar.vue'
export default {
  middleware: ['auth', 'setAdminLinks'],
  components: {
    NavBar
  },
  data() {
    return {
      //
    }
  },

  beforeMount() {
    this.showScrollBar()
  },
  methods: {
    showScrollBar() {
      document.getElementsByTagName('html')[0].style.overflow = 'scroll'
      document.getElementsByTagName('html')[0].style.overflowX = 'hidden'
    }
  }
}
</script>
<style></style>
