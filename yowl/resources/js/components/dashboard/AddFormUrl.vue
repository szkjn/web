<template>
  <div>
    <div class="p-4">
      <p v-if="this.errors.length">
          <b>Please correct the following error(s):</b>
          <ul>
              <li v-for="error in this.errors" :key="error.id">{{ error }}</li>
          </ul>
       </p>
      <div class="form-group row">
        <label for="title3" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input
            type="email"
            class="form-control"
            id="title3"
            v-model="newPost.title"
          />
        </div>
      </div>
      <div class="form-group row">
        <label for="content3" class="col-sm-2 col-form-label">URL</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="content3"
            v-model="newPost.url"
          />
        </div>
      </div>
      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Category</legend>
          <div class="d-flex flex-row flex-wrap">
            <div
              v-for="category in $store.state.categories"
              :key="category.id"
              class="form-check"
            >
              <input
                class="form-check-input"
                type="radio"
                name="gridRadios"
                id="gridRadios1"
                :value="category.id"
                v-model="newPost.category_id"
                checked
              />
              <label class="form-check-label mr-2" for="gridRadios1">
                {{ category.name }}
              </label>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-group row">
        <div class="col-sm-10">
          <button @click="post" type="submit" class="btn btn-primary">
            Post
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AddFormUrl",
  data() {
    return {
      errors: [],
      newPost: {
        user_id: this.$store.state.currentUser.id,
        title: null,
        content: "",
        category_id: null,
        picture: "",
        url: null,
        votes: 0,
      },
    };
  },
  methods: {
    post() {
      this.scrape(this.newPost.url);
      // this.checkForm();
      // if (this.checkForm) {
      //   console.log(this.newPost);
      //   this.$store.dispatch("createPost", this.newPost);
      //   this.$store.state.showForm = false;
      // }
    },
    checkForm() {
      if (this.newPost.title && this.newPost.url && this.newPost.category_id) {
        return true;
      }

      this.errors = [];

      if (!this.newPost.title) {
        this.errors.push("Title required");
      }
      if (!this.newPost.url) {
        this.errors.push("URL required");
      }
      if (!this.newPost.category_id) {
        this.errors.push("Category required");
      }
    },
  },
};
</script>

<style>
</style>