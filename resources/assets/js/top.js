import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './components/TopComponent'

Vue.use(BootstrapVue)

new Vue({
  el: '#top',
  components: {
    top: App
  }
})
