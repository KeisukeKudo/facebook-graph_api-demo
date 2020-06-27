import Vue from 'vue';
import bootstrap from './bootstrap';
import App from '@/components/ExampleComponent.vue';

bootstrap();

new Vue({
  el: '#app',
  render: h => h(App)
});
