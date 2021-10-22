<template>
  <div class="container">
    <div class="posts"><Posts /></div>
    <div class="aside d-none d-lg-block">
      <div class="categories"><AsideCategories /></div>
      <div class="recent-posts"><AsidePosts /></div>
    </div>
    <div v-show="$store.state.showPost">
      <PostModal />
    </div>
  </div>
</template>

<script>
import AsideCategories from "./AsideCategories.vue";
import Posts from "../posts/Posts.vue";
import AsidePosts from "./AsidePosts.vue";
import PostModal from "../posts/PostModal.vue";

export default {
  name: "Home",
  components: {
    Posts,
    AsidePosts,
    AsideCategories,
    PostModal,
  },
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: space-around;
  margin: 0 auto;
}
/* .aside {
  display: flex;
  flex-direction: column;
} */
.aside div {
  margin-bottom: 20px;
}
</style>