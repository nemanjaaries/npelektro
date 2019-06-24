<template>
  <v-app>
    <v-content>
      <nuxt />
    </v-content>
  </v-app>
</template>
<script>
export default {
  name: 'App',
  components: {},
  data() {
    return {
      //
    }
  },
  beforeMount() {
    this.hideScrollBar()
  },
  methods: {
    hideScrollBar() {
      document.getElementsByTagName('html')[0].style.overflow = 'hidden'
    }
  }
}
</script>
<style>
body {
  margin: 0;
  padding: 0;
  overflow-x: hidden;
}
html {
  /* overflow-y: hidden; */
}
.v-toolbar__content {
  padding: 0;
}
/* Extra small (small to large handset) */
@media only screen and (max-width: 600px) {
  .container {
    padding: 10;
  }
}
/* Small (small to medium tablet) */
@media only screen and (max-width: 959px) {
}
/* Medium (large tablet to laptop) */
@media only screen and (min-width: 960px) {
  .container {
    width: 950px;
    padding: 0;
  }
}
/* Large (desktop) */
@media only screen and (min-width: 1264px) {
  .container {
    width: 1170px;
    padding: 0;
  }
}
/* Extra large (4k and ultra-wides) */
@media only screen and (min-width: 1904px) {
}
</style>
