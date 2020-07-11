import Vue from 'vue';
import App from '@/pages/index.vue';
import bootstrap from '@/bootstrap';

bootstrap();

// eslint-disable-next-line no-new
new Vue({
  el: '#app',
  render: (h) => h(App),
});
