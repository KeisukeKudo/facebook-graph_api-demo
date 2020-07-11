<template>
  <div class="nes-container with-title">
    <span class="title">Profile</span>
    <div class="coreteam-members">
      <section class="nes-container is-dark member-card">
        <Avatar :image="user.picture.data.url" />
        <div class="profile">
          <section class="message-list">
            <Message :name="user.name" />
          </section>
          <div>
            <i class="nes-jp-logo"></i>
            <i class="snes-jp-logo"></i>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script lang="ts">
import Vue, { PropType } from 'vue';
import Avatar from '@/components/user/facebook/Avatar.vue';
import Message from '@/components/user/facebook/Message.vue';
import { User } from '@/types/response/user.d';

export default Vue.extend({
  name: 'Profile',
  components: {
    Avatar,
    Message,
  },
  props: {
    user: {
      type: Object as PropType<User>,
      required: true,
    },
  },
});
</script>
