<template>
  <div class="block">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
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
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="dropdown04"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >CRUD</a
            >
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item"
                ><router-link :to="{ name: 'manage-user' }"
                  >Users</router-link
                ></a
              >
              <a class="dropdown-item"
                ><router-link :to="{ name: 'manage-category' }"
                  >Categories</router-link
                ></a
              >
              <a class="dropdown-item"
                ><router-link :to="{ name: 'manage-post' }"
                  >Posts</router-link
                ></a
              >
              <a class="dropdown-item"
                ><router-link :to="{ name: 'manage-comment' }"
                  >Comments</router-link
                ></a
              >
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <h5 class="text-center m-4">
        Hellowl {{ $store.state.currentUser.name }} ! Welcome back !
      </h5>

      <div class="d-flex w-100">
        <div class="card w-100">
          <div class="card-header">Dashboard</div>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <h5>
                Total users:
                {{ $store.state.users.length }}
              </h5>
            </li>
            <li class="list-group-item">
              <h5>
                Number of Categories :
                {{ $store.state.categories.length }}
              </h5>
            </li>
            <li class="list-group-item">
              <h5>
                Number of Posts:
                {{ $store.state.posts.length }}
              </h5>
            </li>
            <li class="list-group-item">
              <h5>
                Total votes:
                {{ totalVotes }}
              </h5>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container my-4">
      <div class="card" style="width: 18rem">
        <div class="card-header">
          <h5>Number of Posts by Categories:</h5>
        </div>
        <ul class="list-group list-group-flush">
          <li
            class="list-group-item"
            v-for="category in $store.state.categories"
            :key="category.id"
          >
            {{ category.name }} : {{ nbrOfPostsByCategory(category.id) }}
          </li>
        </ul>
      </div>
    </div>

    <Radar v-if="categories.length > 0" :feed="categories" />
  </div>
</template>

<script>
import Radar from "./Radar.vue";

export default {
  name: "AdminPanel",
  components: {
    Radar,
  },
  data() {
    return {
      categories: [],
    };
  },
  async mounted() {
    await axios.get("api/categories").then((res) => {
      res.data.forEach((category) => {
        this.categories.push(category.name);
      });
      //this.categories = res.data;
    });
  },
  computed: {
    totalVotes() {
      let votes = 0;
      for (let i = 0; i < this.$store.state.posts.length; i++) {
        votes += this.$store.state.posts[i].votes;
      }
      return votes;
    },
    test() {
      return 100;
    },
  },
  methods: {
    nbrOfPostsByCategory(catId) {
      let count = 0;
      // console.log("category.id : " + catId);
      for (let i = 0; i < this.$store.state.posts.length; i++) {
        // console.log('post.category_id : ' + this.$store.state.posts[i].category_id);
        if (catId === this.$store.state.posts[i].category_id) {
          count++;
        }
      }
      return count;
    },
  },
};
</script>

<style scoped>
</style>