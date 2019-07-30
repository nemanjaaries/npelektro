export default function({ store }) {
  // Postavljam linkove dostupnih stranica za korisnika sa rolom 'admin'
  if (
    store.getters['auth/user'].role === 'admin' &&
    store.getters['link/links'] === null
  ) {
    store.dispatch('link/setLinks', [
      { icon: 'person', text: 'Profil', route: '/admin' },
      {
        icon: 'people',
        text: 'Korisnici',
        route: '/admin/users'
      },
      { icon: 'build', text: 'Page2', route: '/admin/page2' }
    ])
  }
  // Postavljam linkove dostupnih stranica za korisnika sa rolom 'manager'
  if (
    store.getters['auth/user'].role === 'manager' &&
    store.getters['link/links'] === null
  ) {
    store.dispatch('link/setLinks', [
      { icon: 'person', text: 'Profil', route: '/admin' },
      { icon: 'build', text: 'Page2', route: '/admin/page2' }
    ])
  }
  // Postavljam linkove dostupnih stranica za korisnika sa rolom 'user'
  if (
    store.getters['auth/user'].role === 'user' &&
    store.getters['link/links'] === null
  ) {
    store.dispatch('link/setLinks', [
      { icon: 'person', text: 'Profil', route: '/admin' },
      { icon: 'build', text: 'Page2', route: '/admin/page2' }
    ])
  }
}
