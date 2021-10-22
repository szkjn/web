<template>
  <div>
    <AdminPanel v-if="isAdmin" />
    <UserPanel v-else />
  </div>
</template>


<script>
import AdminPanel from "./AdminPanel.vue";
import UserPanel from "./UserPanel.vue";
import Radar from "./Radar.vue";

export default {
  name: "Dashboard",
  props: {
    ["user"]: {},
  },
  components: {
    AdminPanel,
    UserPanel,
    Radar,
  },
  computed: {
    isAdmin() {
      return this.$store.state.currentUser.is_admin;
    },
  },
  created() {
    this.setCurrentUser();
    this.$store.dispatch("fetchPosts");
    this.$store.dispatch("fetchUsers");
    this.$store.dispatch("fetchCats");
  },
  methods: {
    setCurrentUser() {
      this.$store.state.currentUser = this.user;
      console.log("dashboard current u:" + this.$store.state.currentUser.name);
    },
  },
};
</script>

<style scoped>
.sidebar-sticky {
  min-width: 400px;
}
nav {
  height: 50px;
}
</style>