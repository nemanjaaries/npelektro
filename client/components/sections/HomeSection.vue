<template>
  <div class="v-header v-container">
    <div class="fullscreen-video-wrap">
      <video class="video-insert" autoplay="true" loop="true" muted>
        <source src="@/assets/videos/turbine.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="header-overlay"></div>
    <div class="header-content">
      <h1 class="display-3">NPElektro</h1>
      <p class="headline">Lorem ipsum dolor sit amet Dolor met!</p>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
h1 {
  animation-name: header;
  animation-duration: 1s;
}
p {
  animation-name: subheader;
  animation-duration: 1s;
}

@keyframes header {
  0% {
    opacity: 0;
    transform: translateY(-250px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}

@keyframes subheader {
  0% {
    opacity: 0;
    transform: translateY(250px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}
.v-header {
  height: 100vh;
  display: flex;
  align-items: center;
  color: #fff;
}
.v-container {
  max-width: 960px;
  padding-left: 1rem;
  padding-right: 1rem;
  margin: auto;
  text-align: center;
}
.fullscreen-video-wrap {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  overflow: hidden;
}
.video-insert {
  height: auto;
  width: 100vw;
}
.header-overlay {
  height: 100vh;
  width: 100vw;
  background-color: #225470;
  opacity: 0.5;
  z-index: 1;
  position: absolute;
  top: 0;
  left: 0;
}
.header-content {
  min-width: 100%;
  z-index: 2;
}
@media (min-aspect-ratio: 16/9) {
  .video-insert {
    width: 100%;
    height: auto;
  }
}
@media (max-aspect-ratio: 16/9) {
  .video-insert {
    width: auto;
    height: 100%;
  }
}
</style>
