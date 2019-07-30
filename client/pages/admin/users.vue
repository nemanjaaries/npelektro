<template>
  <div>
    <h1>Korisnici</h1>
    <register-dialog />
  </div>
</template>

<script>
import RegisterDialog from '@/components/admin/RegisterDialog.vue'
export default {
  middleware: 'adminRole',
  layout: 'admin',
  components: {
    RegisterDialog
  }
}
</script>

<style></style>
