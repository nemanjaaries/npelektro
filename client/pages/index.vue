<template>
  <div id="landing-page">
    <nav-bar
      :sections="sections"
      :scrollPosition="scrollPosition"
      @scroll="scroll"
    />
    <vue-scroll ref="vs" @handle-scroll="handleScroll">
      <div id="scroll-area">
        <div>
          <div id="pocetna" class="sec" style="height: 100vh;">
            <home-section />
          </div>
          <div id="usluge" class="sec">
            <about-section :scroll-position="scrollPosition" />
          </div>
          <div id="projekti" class="sec">
            <services-section :scroll-position="scrollPosition" />
          </div>
          <div id="kontakt" class="sec">
            <contact-section />
          </div>
          <div id="footer">
            <footer-section />
          </div>
        </div>
      </div>
    </vue-scroll>
  </div>
</template>

<script>
// import Logo from '~/components/Logo.vue'
import vueScroll from 'vuescroll'
import NavBar from '@/components/NavBar.vue'
import HomeSection from '@/components/sections/HomeSection.vue'
import ServicesSection from '@/components/sections/ServicesSection.vue'
import AboutSection from '@/components/sections/AboutSection.vue'
import ContactSection from '@/components/sections/ContactSection.vue'
import FooterSection from '@/components/sections/FooterSection.vue'

export default {
  components: {
    vueScroll,
    NavBar,
    HomeSection,
    AboutSection,
    ServicesSection,
    ContactSection,
    FooterSection
  },
  data() {
    return {
      scrollPosition: null,
      sections: []
    }
  },
  mounted() {
    const sections = document.querySelectorAll('.sec')

    Array.from(sections).forEach(section => {
      this.sections.push({
        title: section.id,
        anchor: '#' + section.id,
        isActive: false,
        position: {
          start: section.offsetTop,
          end: section.offsetTop + section.offsetHeight
        }
      })
    })
    this.sections[0].isActive = true
  },
  methods: {
    scroll(event) {
      this.$refs.vs.scrollIntoView(event, 1000)
    },
    handleScroll(vertical) {
      this.scrollPosition = vertical.scrollTop
      this.sections = []
      const sections = document.querySelectorAll('.sec')
      Array.from(sections).forEach(section => {
        this.sections.push({
          title: section.id,
          anchor: '#' + section.id,
          isActive: false,
          position: {
            start: section.offsetTop,
            end: section.offsetTop + section.offsetHeight
          }
        })
      })
    }
  }
}
</script>
<style scoped>
#landing-page {
  width: 100vw;
  height: 100vh;
}
#pocetna {
}
#usluge {
}
#projekti {
  background-color: #232a34;
  padding-bottom: 80px;
}
#kontakt {
}
#footer {
  background-color: #1e1e1e;
}
</style>
