<template>
  <div class="wrapper">
    <div class="service-card">
      <div class="icon-heading">
        <div class="icon-wrap">
          <v-icon class="icon">home</v-icon>
        </div>
        <h6>Web design</h6>
      </div>
      <p>
        Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod,
        tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut
        veniam, quis nostrud exercitation ullamco aliquip ex ea commodo
        consequat.
      </p>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
.wrapper {
  position: relative;
}
.service-card {
  border: 1px solid #808489;
  text-align: center;
  margin-bottom: 20px;
  padding: 118px 23px 65px 23px;
  overflow: hidden;
}
.icon-heading {
  position: absolute;
  width: 100%;
  left: 0;
  right: 0;
  top: 100px;
  font-size: 18px;
  transition: all 0.5s;
}
.icon-heading h6 {
  color: #6f6f6f;
  font-weight: bold;
  font-size: 18px;
}
.icon-wrap {
  font-size: 48px;
  color: #808489;
  width: 80px;
  margin: 0 auto;
  background: #232a34;
}
.icon {
  font-size: 65px;
  color: #6f6f6f;
}
p {
  color: #fff;
  transform: translateY(200px);
  transition: opacity 0.8s, transform 0.8s;
  opacity: 0;
  transition-delay: 0.2s;
}
.service-card:hover {
  border: 1px solid #d73e4d;
}
.service-card:hover p {
  opacity: 1;
  transform: translateY(0);
}
.service-card:hover .icon-heading {
  top: -40px;
}
.service-card:hover .icon,
.service-card:hover .icon-heading h6 {
  color: #d73e4d;
}
</style>
