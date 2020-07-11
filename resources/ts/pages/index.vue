<template>
  <main>
    <div class="content">
      <Profile :user="user" />
    </div>
  </main>
</template>

<script lang="ts">
import Vue from 'vue';
import Profile from '@/components/user/facebook/Profile.vue';
import { User } from '~/types/response/user.d';

export type DataType = {
  user: User;
};

export default Vue.extend({
  name: 'User',
  components: {
    Profile,
  },
  data(): DataType {
    return {
      user: {} as User,
    };
  },
  async mounted() {
    const response = await window.axios.get<User>('api/facebook/me');
    if (response.status !== 200) {
      console.log(response);
      window.location.href = '/login';
      return;
    }

    this.user = response.data;
    console.log(this.user);
  },
});
</script>
