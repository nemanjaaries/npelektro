import Vue from 'vue'
import vuescroll from 'vuescroll'

Vue.use(vuescroll, {
  ops: {
    // The global config
    bar: {
      showDelay: 500,
      onlyShowBarOnScroll: true,
      keepShow: false,
      background: '#d73e4d',
      opacity: 1,
      hoverStyle: false,
      specifyBorderRadius: false,
      minSize: 0,
      size: '6px',
      disable: false
    },
    vuescroll: {
      wheelScrollDuration: 400
    }
  },
  name: 'myScroll' // customize component name, default -> vueScroll
})
