<template>
  <nav>
    <v-toolbar flat app>
      <v-toolbar-side-icon class="grey--text ml-2" @click="drawer = !drawer" />
      <v-toolbar-title class="text-uppercase grey--text">
        <span class="font-weight-light">np</span>
        <span>elektro</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn flat color="grey" @click="logout">
        logout
        <v-icon right>exit_to_app</v-icon>
      </v-btn>
    </v-toolbar>
    <v-navigation-drawer v-model="drawer" app class="primary">
      <v-list dark>
        <v-list-tile>
          <v-list-tile-action>
            <v-icon class="white--text">folder</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title class="white--text">{{
              $auth.user.username
            }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile
          v-for="(link, index) in links"
          :key="index"
          router
          :to="link.route"
        >
          <v-list-tile-action>
            <v-icon class="white--text">{{ link.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title class="white--text">{{
              link.text
            }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
  </nav>
  <!-- <div>
    <span>
      <nuxt-link to="/admin">Index</nuxt-link>
    </span>
    <span>
      <nuxt-link to="/admin/page1">Page1</nuxt-link>
    </span>
    <span>
      <nuxt-link to="/admin/page2">Page2</nuxt-link>
    </span>
    <span v-if="loggedIn">
      <span>{{ $auth.user.email }}</span>
      <v-btn @click="logout">logout</v-btn>
    </span>
  </div>-->
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      links: [
        { icon: 'dashboard', text: 'Dashboard', route: '/admin' },
        { icon: 'folder', text: 'Page1', route: '/admin/page1' },
        { icon: 'person', text: 'Page2', route: '/admin/page2' }
      ]
    }
  },
  computed: {
    loggedIn() {
      return this.$auth.loggedIn
    }
  },
  methods: {
    logout() {
      return this.$auth.logout()
    }
  }
}
</script>

<style></style>
