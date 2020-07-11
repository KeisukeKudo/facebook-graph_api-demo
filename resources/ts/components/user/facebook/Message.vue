<template>
  <section class="message -left">
    <div class="nes-balloon from-left is-dark">
      <p>Hello !!</p>
      <p>My name is {{ name }}</p>
    </div>
  </section>
</template>

<script lang="ts">
import Vue from 'vue';

export default Vue.extend({
  name: 'Message',
  props: {
    name: {
      type: String,
      required: true,
    },
  },
});
</script>
