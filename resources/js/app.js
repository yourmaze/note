require('./bootstrap')

import UIkit from 'uikit';
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

window.UIkit = UIkit;

createApp(App).
  use(router).
  mount('#app')
