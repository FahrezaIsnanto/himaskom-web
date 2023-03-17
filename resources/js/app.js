import { createApp, h } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import VueParticles from 'vue-particles'
import VueSmoothScroll from 'vue3-smooth-scroll'
import Notifications from '@kyvg/vue3-notification'

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(VueParticles)
      .use(VueSmoothScroll)
      .use(Notifications)
      .mount(el)
  },
})

InertiaProgress.init({ color: "#FF5D13" });