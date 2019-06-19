<template>
  <div class="about-section">
    <v-container grid-list-lx>
      <v-layout row wrap justify-center>
        <v-flex xs12>
          <base-title
            title="Naslov"
            subtitle="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore
            error, cum suscipit non consequatur quos expedita culpa est alias
            architecto ex fugit nam corporis perferendis.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore
            error, cum suscipit non consequatur quos expedita culpa est alias
            architecto ex fugit nam corporis perferendis."
          />
        </v-flex>
        <v-flex
          xs12
          sm6
          v-for="fl in 3"
          md4
          :key="fl"
          data-aos="fade-up"
          class="animate"
          :class="{
            'ma-0': $vuetify.breakpoint.xs,
            'px-3': $vuetify.breakpoint.smAndUp
          }"
        >
          <activity-card />
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import ActivityCard from '@/components/ActivityCard.vue'

export default {
  components: {
    ActivityCard
  },
  props: ['scrollPosition'],
  watch: {
    scrollPosition() {
      let viewPortSize = Math.max(
        document.documentElement.clientHeight,
        window.innerHeight || 0
      )
      let viewPortBottom = this.scrollPosition + viewPortSize
      let elements = document.querySelectorAll('.animate')
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

      // console.log(elements);
      // console.log(this.scrollPosition + viewPortSize);
    }
  }
}
</script>

<style scoped>
.about-section {
}
</style>
