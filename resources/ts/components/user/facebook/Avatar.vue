<template>
  <div class="avatar">
    <img alt="user image" :src="image" />
  </div>
</template>

<script lang="ts">
import Vue from 'vue';

export default Vue.extend({
  name: 'Avatar',
  props: {
    image: {
      type: String,
      required: true,
    },
  },
});
</script>
