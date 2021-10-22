<template>
  <div>
    <div
      class="d-flex flex-column align-items-stretch flex-shrink-0"
      style="width: 380px"
    >
      <div
        href="/"
        class="text-white bg-yowl p-3 align-items-center rounded-top"
      >
        <h5 class="p-0 m-0 mono">Recent Posts</h5>
      </div>
      <div
        v-for="post in $store.state.posts"
        :key="post.id"
        class="list-group list-group-flush border-bottom scrollarea"
      >
        <a
          href="#"
          class="list-group-item list-group-item-action py-3 lh-tight"
          v-if="post.id <= 5"
          @click="
            $store.state.currentPost = post;
            showPostDetails();
          "
        >
          <div
            class="
              d-flex
              w-100
              align-items-center
              justify-content-between
              zindex-dropdown
            "
          >
            <strong class="mb-1">{{ post.title }}</strong>
            <small class="text-muted">{{
              post.created_at.substring(0, 10)
            }}</small>
          </div>
          <div class="mb-1 roboto-classic">{{ post.content.substring(0, 36) }} ...</div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RecentPosts",
  methods: {
    showPostDetails() {
      this.$store.state.showPost = true;
      this.$store.state.fixedNav = false;
    },
  },
};
</script>

<style scoped>
* {
  z-index: 0;
}
</style>