<template>
  <div>
    <div class="album">
      <div class="container">
        <div class="input-group rounded mb-2">
          <input
            type="search"
            class="form-control rounded"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="search-addon"
            v-model="q"
          />
          <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </div>
        <div
          v-for="post in getFilterredPosts"
          :key="post.id"
          class="card card-body mb-2 p-0"
        >
          <Post :post="post" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Post from "./Post.vue";

export default {
  name: "Posts",
  components: {
    Post,
  },
  props: {
    ["user"]: {},
  },
  data() {
    return {
      q: "",
    };
  },
  created() {
    this.$store.state.currentUser = this.user;
    this.$store.dispatch("fetchCats");
    this.$store.dispatch("fetchUsers");
    this.$store.dispatch("fetchPosts");
  },
  computed: {
    getFilterredPosts() {
      return this.$store.state.posts.filter((post) =>
        post.title.toLowerCase().includes(this.q.toLowerCase())
      );
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 1000px;
}
</style>