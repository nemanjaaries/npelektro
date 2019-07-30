import axios from 'axios'
export default {
  getUsers() {
    return this.$axios.$get('/users')
  }
}
