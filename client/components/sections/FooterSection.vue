<template>
  <footer class="footer-section">
    <v-container>
      <a class="logo" href="#">
        <img src="@/assets/images/logo.png" />
      </a>
      <span class="medias">
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
        <a href="#">
          <v-icon class="media">wifi</v-icon>
        </a>
      </span>
      <p>
        Copyright @2018 All rights reserved | This template is made with by
        Colorlib
      </p>
    </v-container>
  </footer>
</template>

<script>
export default {}
</script>

<style scoped>
a {
  text-decoration: none;
}
.footer-section {
  text-align: center;
  padding: 60px 0 25px 0;
  color: #fff;
}
.logo {
  display: inline-block;

  margin-bottom: 20px;
}
.medias {
  display: block;
  margin-top: 13px;
}
.medias a * {
  display: inline-block;
  padding: 10px;
  border: 1px solid #d73e4d;
  border-radius: 50%;
  margin: 0 8px;
  color: #d73e4d;
  transition: all 1s;
}
.medias a:hover * {
  color: #fff;
  background-color: #d73e4d;
}
.media {
  font-size: 25px;
  display: inline-block;
  font-weight: 100;
}

p {
  margin: 50px 0 0 0;
}
</style>
