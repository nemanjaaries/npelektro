<template>
  <div id="profile-page">
    <h1>Profil</h1>
    <v-container fluid class="ma-0">
      <v-layout row wrap>
        <v-flex xs12 md4 lg3>
          <v-img
            :src="`https://picsum.photos/500/300?image`"
            :lazy-src="`https://picsum.photos/10/6?image`"
            aspect-ratio="1"
            class="grey lighten-2"
          ></v-img>
        </v-flex>
        <v-flex xs12 md8 lg9 class="padding-left">
          <h1>Ime</h1>
          <p>{{ user.username }}</p>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {
  layout: 'admin'
}
</script>

<style scoped>
.padding-left {
  padding-left: 30px;
}

/* Extra small (small to large handset) */
@media only screen and (max-width: 600px) {
  .padding-left {
    padding-left: 0;
  }
}
/* Small (small to medium tablet) */
@media only screen and (max-width: 959px) {
}
/* Medium (large tablet to laptop) */
@media only screen and (min-width: 960px) {
  .padding-left {
    padding-left: 30px;
  }
}
/* Large (desktop) */
@media only screen and (min-width: 1264px) {
}
/* Extra large (4k and ultra-wides) */
@media only screen and (min-width: 1904px) {
}
</style>
