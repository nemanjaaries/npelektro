<template>
  <v-dialog v-model="loginDialog" max-width="400px">
    <template v-slot:activator="{ on }">
      <v-btn class="custom-btn" :ripple="false" flat v-on="on">uloguj se</v-btn>
    </template>

    <v-card class="card">
      <v-card-text class="px-4 py-2">
        <p v-if="errors.message" class="server-message">
          {{ errors.message[0] }}
        </p>
        <form class="form" @submit.prevent="login">
          <v-text-field
            v-model="email"
            :error-messages="emailErrors"
            color="primary"
            label="Email"
            required
            @input="$v.email.$touch()"
            @blur="$v.email.$touch()"
          ></v-text-field>
          <v-text-field
            v-model="password"
            :error-messages="passwordErrors"
            type="current-password"
            class="mb-2"
            color="primary"
            label="Sifra"
            required
            @input="$v.password.$touch()"
            @blur="$v.password.$touch()"
          ></v-text-field>

          <v-card-actions class="pa-0">
            <v-btn type="submit" block dark flat color="primary"
              >uloguj se</v-btn
            >
          </v-card-actions>
        </form>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, minLength, maxLength, email } from 'vuelidate/lib/validators'
export default {
  mixins: [validationMixin],
  validations: {
    email: { required, email },
    password: { required, minLength: minLength(8), maxLength: maxLength(15) }
  },
  data() {
    return {
      loginDialog: false,

      password: '',
      email: ''
    }
  },
  computed: {
    passwordErrors() {
      const errors = []
      if (!this.$v.password.$error) return errors
      !this.$v.password.minLength &&
        errors.push('Sifra mora imati vise od 8 karaktera')
      !this.$v.password.maxLength &&
        errors.push('Sifra mora imati manje od 15 karaktera')
      !this.$v.password.required && errors.push('Sifra je obavezna.')
      return errors
    },

    emailErrors() {
      const errors = []
      if (!this.$v.email.$error) return errors
      !this.$v.email.email && errors.push('E-mail mora biti validan')
      !this.$v.email.required && errors.push('E-mail  je obavezan')
      return errors
    }
  },
  watch: {
    loginDialog() {
      if (this.loginDialog === false) {
        this.clear()
        this.$store.dispatch('validation/clearErrors')
      }
    }
  },
  methods: {
    async login() {
      const form = {
        email: this.email,
        password: this.password
      }
      this.$v.$touch()
      if (this.$v.$invalid) {
        console.log('Validacija nije prosla')
      } else {
        try {
          await this.$auth.login({ data: form })
        } catch (e) {
          console.log(e)
        }
      }
    },
    // submit() {},
    clear() {
      this.$v.$reset()
      this.password = ''
      this.email = ''
    }
  }
}
</script>

<style scoped>
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
.server-message {
  border-bottom: 2px solid #dd2c00;
  color: #dd2c00;
  font-size: 12px;
}
</style>
