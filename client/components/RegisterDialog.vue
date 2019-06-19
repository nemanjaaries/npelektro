<template>
  <v-dialog v-model="loginDialog" max-width="400px">
    <template v-slot:activator="{ on }">
      <v-btn class="custom-btn" :ripple="false" flat v-on="on"
        >registruj se</v-btn
      >
    </template>

    <v-card class="card">
      <v-card-text class="px-4 py-2">
        <form class="form">
          <v-text-field
            v-model="username"
            :error-messages="usernameErrors"
            :counter="15"
            label="Username"
            required
            @input="$v.username.$touch(), clearUsernameError()"
            @blur="$v.username.$touch()"
          ></v-text-field>
          <v-text-field
            v-model="email"
            :error-messages="emailErrors"
            label="E-mail"
            required
            @input="$v.email.$touch(), clearEmailError()"
            @blur="$v.email.$touch()"
          ></v-text-field>
          <v-text-field
            v-model="password"
            :error-messages="passwordErrors"
            :counter="15"
            label="Sifra"
            required
            @input="$v.password.$touch(), clearPasswordError()"
            @blur="$v.password.$touch()"
          ></v-text-field>
          <v-text-field
            v-model="confirmPassword"
            :error-messages="confirmPasswordErrors"
            label="Potvrda Sifre"
            required
            @input="$v.confirmPassword.$touch()"
            @blur="$v.confirmPassword.$touch()"
          ></v-text-field>
          <v-card-actions class="pa-0">
            <v-btn
              block
              dark
              flat
              color="primary"
              class="mt-3"
              @click="register"
              >registruj se</v-btn
            >
          </v-card-actions>
        </form>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
import { validationMixin } from 'vuelidate'
import {
  required,
  minLength,
  maxLength,
  email,
  sameAs
} from 'vuelidate/lib/validators'

export default {
  mixins: [validationMixin],
  validations: {
    username: { required, minLength: minLength(3), maxLength: maxLength(15) },
    email: { required, email },
    password: { required, minLength: minLength(8), maxLength: maxLength(15) },
    confirmPassword: { required, sameAs: sameAs('password') }
  },
  data() {
    return {
      loginDialog: false,

      username: '',
      password: '',
      email: '',
      confirmPassword: '',
      serverErrors: {
        username: [],
        email: [],
        password: []
      }
    }
  },
  computed: {
    usernameErrors() {
      const errors = []
      if (!this.$v.username.$error) return this.serverErrors.username
      !this.$v.username.minLength &&
        errors.push('Username mora imati vise od 3 karaktera')
      !this.$v.username.maxLength &&
        errors.push('Username mora imati manje od 15 karaktera')
      !this.$v.username.required && errors.push('Username je obavezan.')
      return errors
    },
    passwordErrors() {
      const errors = []
      if (!this.$v.password.$error) return this.serverErrors.password
      !this.$v.password.minLength &&
        errors.push('Sifra mora imati vise od 8 karaktera')
      !this.$v.password.maxLength &&
        errors.push('Sifra mora imati manje od 15 karaktera')
      !this.$v.password.required && errors.push('Sifra je obavezna.')
      return errors
    },
    confirmPasswordErrors() {
      const errors = []
      if (!this.$v.confirmPassword.$dirty) return errors
      !this.$v.confirmPassword.sameAs &&
        errors.push('Neispravna potvrda sifre.')
      !this.$v.confirmPassword.required &&
        errors.push('Potvrda sifre je obavezna.')
      return errors
    },
    emailErrors() {
      const errors = []
      if (!this.$v.email.$error) return this.serverErrors.email
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
        this.clearUsernameError()
        this.clearEmailError()
        this.clearPasswordError()
      }
    }
  },
  methods: {
    clearUsernameError() {
      this.serverErrors.username = []
    },
    clearEmailError() {
      this.serverErrors.email = []
    },
    clearPasswordError() {
      this.serverErrors.password = []
    },
    serverValidation() {
      if (this.errors.username) {
        this.serverErrors.username.push(this.errors.username)
      }
      if (this.errors.email) {
        this.serverErrors.email.push(this.errors.email)
      }
      if (this.errors.password) {
        this.serverErrors.password.push(this.errors.password)
      }
    },
    async register() {
      const form = {
        username: this.username,
        email: this.email,
        password: this.password
      }
      this.$v.$touch()
      if (this.$v.$invalid) {
        console.log('Validacija nije prosla')
      } else {
        console.log('Validacija je prosla')

        try {
          await this.$axios.post('/auth/register', form)
        } catch (e) {
          this.serverValidation()
          return
        }

        this.$auth.login({ data: form })
      }

      // this.$router.push({ path: '/admin' })
    },
    submit() {
      this.$v.$touch()
    },
    // submit() {},
    clear() {
      this.$v.$reset()
      this.username = ''
      this.email = ''
      this.password = ''
      this.confirmPassword = ''
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
</style>
