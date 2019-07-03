import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './components/HeaderComponent'

Vue.use(BootstrapVue)

new Vue({
  el: '#header',
  components: {
    theHeader: App
  }
})
