<template>
  <header class="navigation" :class="{ fixed: fixedNav }">
    <v-container class="py-0">
      <v-toolbar class="pt-2" color="rgba(255, 0, 0, 0)" flat dark>
        <v-toolbar-title class="ma-0">
          <img src="@/assets/images/logo.png" />
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
          <v-btn
            v-for="(link, index) in sections"
            :key="index"
            :ripple="false"
            flat
            class="custom-btn font-weight-bold"
            :class="{ active: link.isActive }"
            @click="emitScroll(link.anchor)"
            >{{ link.title }}</v-btn
          >
          <template v-if="!authenticated">
            <login-dialog />
            <register-dialog />
          </template>
          <template v-else>
            <v-btn
              nuxt-link
              to="/admin"
              :ripple="false"
              flat
              class="custom-btn font-weight-bold"
              >admin</v-btn
            >
          </template>
        </v-toolbar-items>
        <v-toolbar-side-icon
          class="hidden-md-and-up"
          @click="navCollapse = !navCollapse ? true : false"
        ></v-toolbar-side-icon>
      </v-toolbar>
    </v-container>
    <div>
      <v-list dark class="nav-collapse" :class="{ in: navCollapse }">
        <v-list-tile
          v-for="(link, index) in sections"
          :key="index"
          :class="{ active: link.isActive }"
          @click="emitScroll(link.anchor)"
        >
          <v-list-tile-content>
            <v-list-tile-title class="text-uppercase">
              {{ link.title }}
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </div>
  </header>
</template>

<script>
import LoginDialog from '@/components/LoginDialog.vue'
import RegisterDialog from '@/components/RegisterDialog.vue'
export default {
  components: {
    LoginDialog,
    RegisterDialog
  },
  props: ['scrollPosition', 'sections'],
  data() {
    return {
      fixedNav: false,
      navCollapse: false
    }
  },
  watch: {
    scrollPosition() {
      this.sections.map(section => {
        if (
          section.position.start <= this.scrollPosition &&
          section.position.end > this.scrollPosition
        ) {
          section.isActive = true
        } else {
          section.isActive = false
        }
      })
      this.fixedNav = this.scrollPosition !== 0
      //  this.links.map(link => {
      //   if (link.anchor === event) {
      //     link.isActive = true;
      //   } else {
      //     link.isActive = false;
      //   }
      // });
    }
  },
  mounted() {},
  methods: {
    emitScroll(event) {
      this.$emit('scroll', event)
      this.navCollapse = false
    }
  }
}
</script>

<style scoped>
.navigation {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}
.navigation.fixed {
  position: fixed;
  width: 100%;
  background: rgba(0, 0, 0, 0.5);
  margin: 0;
  animation-name: menu_sticky;
  animation-duration: 0.7s;
  animation-timing-function: ease-in-out;
}

@media (max-width: 960px) {
  .fixed {
    background: rgba(0, 0, 0, 1) !important;
  }
}
@keyframes menu_sticky {
  0% {
    margin-top: -120px;
    opacity: 0;
  }

  50% {
    margin-top: -64px;
    opacity: 0;
  }
  100% {
    margin-top: 0;
    opacity: 1;
  }
}

.nav-collapse {
  background-color: black;
  color: white;
  display: none;
}
.nav-collapse.in {
  display: block;
  width: 100vw;
  height: 100vh;
}
.custom-btn {
  cursor: pointer;
  transition: all 0.2s;
}
.custom-btn::before {
  color: transparent;
}

.custom-btn:hover {
  color: #d73e4d;
}

.active {
  color: #d73e4d;
}
</style>
