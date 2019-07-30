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
      <v-layout column align-center>
        <v-flex class="mt-4">
          <v-avatar size="150">
            <img src="@/assets/images/tesla.jpg" alt="user" />
          </v-avatar>
          <p class="text-xs-center white--text subheding mt-2 text-capitalize">
            {{ user.username }}
          </p>
        </v-flex>
      </v-layout>
      <v-list dark>
        <v-list-tile
          v-for="(link, index) in links"
          :key="index"
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
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      drawer: true
    }
  },
  computed: {
    ...mapGetters({
      links: 'link/links'
    }),
    loggedIn() {
      return this.$auth.loggedIn
    }
  },
  methods: {
    logout() {
      this.$store.dispatch('link/clearLinks')
      return this.$auth.logout()
    }
  }
}
</script>

<style></style>
