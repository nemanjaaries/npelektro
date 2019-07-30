export const state = () => ({
  links: null
})

export const getters = {
  links(state) {
    return state.links
  }
}

export const mutations = {
  SET_LINKS(state, links) {
    state.links = links
  }
}

export const actions = {
  setLinks({ commit }, links) {
    commit('SET_LINKS', links)
  },
  clearLinks({ commit }) {
    commit('SET_LINKS', null)
  }
}
