<template>
  <div class="title">
    <h2 class="display-2" :class="{ dark: dark }">{{ title }}</h2>
    <p class="font-weight-light" :class="{ dark: dark }">{{ subtitle }}</p>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    subtitle: String,
    dark: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style scoped>
.title {
  text-align: center;
  margin-top: 95px;
}
.title h2 {
  position: relative;
  color: #292929;
  text-transform: uppercase;
  font-weight: 700;
}
.title h2::before {
  content: '';
  width: 25px;
  height: 3px;
  position: absolute;
  bottom: -25px;
  left: 50%;
  margin-left: -12px;
  background-color: red;
}
.title p {
  font-size: 16px;
  width: 75%;
  margin: 60px auto 0 auto;
  color: #6f6f5f;
}
.dark {
  color: white !important;
}
/* Extra small (small to large handset) */
@media only screen and (max-width: 600px) {
  .title p {
    width: 100%;
  }
}
/* Small (small to medium tablet) */
@media only screen and (max-width: 959px) {
  .title p {
    width: 100%;
  }
}
/* Medium (large tablet to laptop) */
@media only screen and (min-width: 960px) {
  .title p {
    width: 95%;
  }
}
/* Large (desktop) */
@media only screen and (min-width: 1264px) {
}
/* Extra large (4k and ultra-wides) */
@media only screen and (min-width: 1904px) {
}
</style>
