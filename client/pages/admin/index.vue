<template>
  <div id="profile-page">
    <v-container fluid class="ma-0">
      <v-layout row wrap>
        <v-flex xs12 md4 lg3>
          <v-img
            :src="require('@/assets/images/tesla.jpg')"
            :lazy-src="require('@/assets/images/tesla.jpg')"
            aspect-ratio="1"
            class="grey lighten-2"
          ></v-img>
        </v-flex>
        <v-flex xs12 md8 lg9 class="padding-left">
          <template v-if="!editMode">
            <p class="font-weight-light">Ime</p>
            <span class="text-capitalize">{{ user.username }}</span>
            <p class="font-weight-light">E-posta</p>
            <span>{{ user.email }}</span>
            <v-btn
              v-if="!editMode"
              color="warning"
              class="mx-0"
              @click="editMode = !editMode"
              >izmeni</v-btn
            >
          </template>
          <template v-else>
            <p class="font-weight-light">Ime</p>
            <form @submit.prevent="update">
              <span class="text-capitalize">
                <input type="text" name="username" :value="user.username" />
              </span>
              <p class="font-weight-light">E-posta</p>
              <span>
                <input type="text" name="email" :value="user.email" />
              </span>
              <p class="font-weight-light">Password</p>
              <span>
                <input type="text" name="password" />
              </span>
              <v-btn color="error" @click="editMode = false">Odustani</v-btn>
              <v-btn type="submit" color="success">prihvati</v-btn>
            </form>
          </template>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import UserService from '@/services/UserService.js'

export default {
  layout: 'admin',
  data() {
    return {
      editMode: false
    }
  },
  computed: {},
  notifications: {
    showUpdateError: {
      title: 'Azuriranje Neuspelo',
      message: 'Vase izmene nisu procesuirane',
      type: 'error'
    },
    showUpdateSuccess: {
      title: 'Azuriranje uspesno',
      message: 'Vase izmene su uspesno procesuirane',
      type: 'success'
    }
  },
  methods: {
    updateSuccess(title, message) {
      this.showUpdateSuccess({
        title: title,
        message: message
      })
    },
    updateFailed(message) {
      this.showUpdateError({ message: message })
    },
    async update(submitEvent) {
      const form = {
        username: submitEvent.target.elements.username.value,
        email: submitEvent.target.elements.email.value,
        password: submitEvent.target.elements.password.value
      }
      try {
        const res = await this.$axios.$put(`/users/${this.user.id}`, form)
        this.editMode = false
        this.updateSuccess(res.title, res.message)
      } catch ($e) {
        if ($e.response.data.errors.username) {
          this.updateFailed($e.response.data.errors.username[0])
        }
        if ($e.response.data.errors.email) {
          this.updateFailed($e.response.data.errors.email[0])
        }
      }
    }
  }
}
</script>

<style scoped>
.padding-left {
  padding-left: 30px;
}

p {
  font-size: 20px;
  margin-bottom: 0;
}

span {
  display: block;
  margin-bottom: 10px;
}

/* Extra small (small to large handset) */
@media only screen and (max-width: 600px) {
  .padding-left {
    padding-left: 0;
  }
}
/* Small (small to medium tablet) */
@media only screen and (max-width: 959px) {
}
/* Medium (large tablet to laptop) */
@media only screen and (min-width: 960px) {
  .padding-left {
    padding-left: 30px;
  }
}
/* Large (desktop) */
@media only screen and (min-width: 1264px) {
}
/* Extra large (4k and ultra-wides) */
@media only screen and (min-width: 1904px) {
}
</style>
