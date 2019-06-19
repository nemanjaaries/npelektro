import Vue from 'vue'
import BaseTitle from '@/components/BaseTitle.vue'

const components = { BaseTitle }

Object.entries(components).forEach(([name, component]) => {
  Vue.component(name, component)
})
