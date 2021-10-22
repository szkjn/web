<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-dark bg-success">
      <!-- <a class="navbar-brand" href="#">Admin Panel</a> -->
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarsExample04"
        aria-controls="navbarsExample04"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Dashboard <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#stats">Stats</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container mt-3">
      <h5 class="text-center">Hellowl {{ $store.state.currentUser.name }} !</h5>

      <div v-if="hasPosts" class="d-flex w-100">
        <div class="card w-100">
          <div class="card-header d-flex flex-row justify-content-between">
            <div>Your Posts ({{ this.uPosts.length }})</div>
            <div
              @click="toggleAddForm"
              class="btn rounded-pill border text-white py-0"
            >
              {{ $store.state.showForm ? "x Close" : "+ Add" }}
            </div>
          </div>

          <AddForm v-if="$store.state.showForm" />

          <div
            v-for="post in this.uPosts"
            :key="post.id"
            class="card card-body mb-2 p-0"
          >
            <UserPost :post="post" />
          </div>
        </div>
      </div>

      <div v-else class="d-flex w-100 text-center">
        <div class="card w-100">
          <div class="card-body w-80">
            <p>You have no posts yet! What are you waiting for ?</p>
          </div>
          <AddForm />
        </div>
      </div>

      <div class="mt-4">
        <div class="card w-100">
          <div class="card-header d-flex flex-row justify-content-between" id="stats">
            Stats
          </div>
          <div class="p-3">
            <div
              class="d-flex flex-row align-items-center justify-content-start"
            >
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"
                />
              </svg>
              <p class="px-2">
                Cake day :
                 <span class="font-weight-bold">{{ $store.state.currentUser.created_at.substring(0, 10) }}</span>
              </p>
            </div>
            <div
              class="d-flex flex-row align-items-center justify-content-start"
            >
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                />
              </svg>
              <p class="px-2">Number of posts :  <span class="font-weight-bold">{{ this.uPosts.length }}</span></p>
            </div>
            <div
              class="d-flex flex-row align-items-center justify-content-start"
            >
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                />
              </svg>
              <p class="px-2">
                Number of votes on your posts : <span class="font-weight-bold">{{ this.uVotesOnPosts }}</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UserPost from "./UserPost.vue";
import AddForm from "./AddForm.vue";

export default {
  name: "UserPanel",
  created() {
    this.$store.dispatch("fetchPostsByUserId");
  },
  computed: {
    uPosts() {
      return this.$store.state.currentUserPosts;
    },
    hasPosts() {
      if (this.uPosts.length > 0) {
        return true;
      }
      return false;
    },
    uVotesOnPosts() {
      let votes = 0;
      for (let i = 0; i < this.uPosts.length; i++) {
        votes += this.uPosts[i].votes;
      }
      return votes;
    },
  },
  methods: {
    fetchPosts() {
      axios
        .get("api/posts")
        .then((res) => {
          state.posts = res.data;
        })
        .then(this.getPostsByUserId());
    },
    getPostsByUserId() {
      let posts = this.$store.state.posts;
      let user = this.$store.state.currentUser;
      // console.log(posts.length);
    },
    toggleAddForm() {
      this.$store.state.showForm = !this.$store.state.showForm;
      // console.log('toggle form');
    },
  },
  components: {
    UserPost,
    AddForm,
  },
};
</script>

<style scoped>
a:hover {
  text-decoration: underline;
}
</style>