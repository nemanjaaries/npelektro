export const state = () => ({
  one: { name: 'Nemanja', lastName: 'Stojadinovic' },
  all: [
    { name: 'Milos', lastName: 'Lazic' },
    { name: 'Janko', lastName: 'Lazic' },
    { name: 'Branko', lastName: 'Lazic' },
    { name: 'Todor', lastName: 'Lazic' }
  ]
})

export const getters = {
  one(state) {
    return state.one
  },
  all(state) {
    return state.all
  }
}
