<template>
  <div class="d-flex flex-row justify-content-start">
    <div v-show="post.picture" id="picture">
      <img
        :src="getImage(post.picture)"
        alt=""
        class="m-0 p-0 w-100"
        id="setCurrentPost"
      />
    </div>
    <div id="info" class="d-flex flex-row pt-1">
      <div class="m-0 p-0 w-100 h-100">
        <h6 id="setCurrentPost" class="m-0 px-2">
          {{ $store.state.currentUser.name }}
        </h6>

        <div class="d-flex flex-column p-2">
          <p v-show="post.url">
            <span class="roboto-classic">from </span><a href="#">Source</a>
          </p>
          <p v-show="post.content" class="roboto-classic">{{ post.content }}</p>
          <p>{{ post.created_at.substring(0, 10) }}</p>
          <h6 class="m-0 p-0 mr-2">
            {{ post.votes }} votes <span class="font-weight-bold">|</span>
            {{ getFilteredComments(post.id).length }}
            comments
          </h6>
        </div>

        <div class="pb-2">
          <div class="text-muted py-0 m-0 mx-2">
            Category :
            {{
              $store.state.categories.find((x) => x.id === post.category_id)
                .name
            }}
          </div>
        </div>

        <p
          @click="deletePost"
          class="btn bg-danger rounded text-light text-center py-0 m-0 mx-2"
        >
          Delete
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "UserPost",
  props: {
    post: Object,
  },
  computed: {
    getComments() {
      return this.$store.state.comments;
    },
  },
  created() {
    this.currentPost = this.post;
    this.$store.dispatch("fetchComments");
    // console.log(this.currentPost);
  },
  methods: {
    deletePost() {
      console.log("post id " + this.post.id);
      this.$store.dispatch("deletePost", this.post.id);
    },
    getImage(imgName) {
      if (imgName.substring(0, 4) == "http") {
        return imgName;
      } else {
        return "images/" + imgName;
      }
    },
    getFilteredComments(id) {
      return this.getComments.filter((comment) => comment.post_id == id);
    },
  },
};
</script>

<style scoped>
#picture img {
  max-width: 300px;
  min-width: 250px;
}
#info {
  min-width: 50%;
}
</style>