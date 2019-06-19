<template>
  <div class="activity-card">
    <div class="icon-wrap">
      <v-icon class="icon">photo_camera</v-icon>
    </div>
    <h5>
      <a href="#">projektovanje isntalacije jake struje</a>
    </h5>
    <p class="font-weight-light">
      Lorem ipsum dolor sit amet, consect et adipiscing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna. Lorem ipsum dolor sit amet,
      consect et adipiscing elit, sed do eiusmod tempor incididunt ut labore et
      dolore magna. Lorem ipsum dolor sit amet, consect et adipiscing elit, sed
      do eiusmod tempor incididunt ut labore et dolore magna. Lorem ipsum dolor
      sit amet, consect et adipiscing elit, sed do eiusmod tempor incididunt ut
      labore et dolore magna.
    </p>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
h5 a {
  display: block;
  text-decoration: none;
  color: #292929;
  margin: 35px 0 20px 0;
  transition: all 0.3s;
}
h5 {
  font-size: 22px;
  text-transform: uppercase;
  font-weight: 700;
}
.activity-card {
  text-align: center;
  margin: 55px 0 100px 0;
}

.icon-wrap {
  text-align: center;
  width: 130px;
  height: 130px;
  margin: 0 auto;
  line-height: 105px;
  border-width: 2px;
  font-size: 55px;
  color: #292929;
  border: 2px solid #d73e4d;
  border-radius: 50%;
  transition: all 0.3s;
}
.icon {
  font-size: 40px;
  color: #292929;
  transition: all 0.3s;
}
.activity-card:hover .icon-wrap {
  background-color: #d73e4d;
}
.activity-card:hover h5 a {
  color: #d73e4d;
}
.activity-card:hover .icon {
  color: white;
}
</style>
