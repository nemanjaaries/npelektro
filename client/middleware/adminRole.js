export default function({ store, redirect }) {
  if (store.getters['auth/user'].role !== 'admin') {
    return redirect('/admin')
  }
}
