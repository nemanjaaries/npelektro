<template>
  <div class="services-section">
    <v-container grid-list-lx>
      <v-layout row wrap justify-center>
        <v-flex xs12>
          <h1 data-aos="zoom-in">AOS Demo</h1>

          <base-title
            class="mb-5"
            dark
            title="Services we provide"
            subtitle="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore
            error, cum suscipit non consequatur quos expedita culpa est alias
            architecto ex fugit nam corporis perferendis.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore
            error, cum suscipit non consequatur quos expedita culpa est alias
            architecto ex fugit nam corporis perferendis."
          />
        </v-flex>
        <v-flex
          v-for="fl in 6"
          :key="fl"
          xs12
          md4
          data-aos="fade-up"
          class="animate py-4"
          :class="{
            'ma-0': isMounted && $vuetify.breakpoint.xs,
            'px-3': isMounted && $vuetify.breakpoint.smAndUp
          }"
        >
          <service-card />
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import ServiceCard from '@/components/ServiceCard.vue'

export default {
  components: {
    ServiceCard
  },
  props: ['scrollPosition'],
  data() {
    return {
      isMounted: false
    }
  },
  watch: {
    scrollPosition() {
      const viewPortSize = Math.max(
        document.documentElement.clientHeight,
        window.innerHeight || 0
      )
      const viewPortBottom = this.scrollPosition + viewPortSize
      const elements = document.querySelectorAll('.animate')
      elements.forEach(element => {
        if (element.offsetTop <= viewPortBottom) {
          if (!element.classList.contains('aos-animate')) {
            console.log('dodajem klasu')
            element.classList.add('aos-animate')
          }
        } else if (element.classList.contains('aos-animate')) {
          console.log('brisem klasu')
          element.classList.remove('aos-animate')
        }
      })
    }
  },
  mounted() {
    this.isMounted = true
  }
}
</script>

<style scoped>
.services-section {
}
</style>
