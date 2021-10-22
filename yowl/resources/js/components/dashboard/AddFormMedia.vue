<template>
  <div>
    <form class="p-4" enctype="form-data" @submit.prevent="post">
      <p v-if="this.errors.length">
          <b>Please correct the following error(s):</b>
          <ul>
              <li v-for="error in this.errors" :key="error.id">{{ error }}</li>
          </ul>
       </p>
      <div class="form-group row">
        <label for="title2" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input
            class="form-control"
            id="title2"
            v-model="newPost.title"
          />
        </div>
      </div>
      <div class="form-group row">
        <label for="content2" class="col-sm-2 col-form-label">Upload image</label>
        <div class="col-sm-10">
          <input
            type="file"
            class="form-control"
            id="content2"
            @change="handleOnchange"
          />
        </div>
      </div>
      <div class="form-group row">
        <label for="content2" class="col-sm-2 col-form-label">Image Url</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="content2"
            v-model="newPost.picture"
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
          <button type="submit" class="btn btn-primary">
            Post
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "AddFormMedia",
  data() {
    return {
      errors: [],
      newPost: {
        user_id: this.$store.state.currentUser.id,
        title: null,
        content: "",
        category_id: null,
        picture: null,
        image: "",
        imageName:"",
        url: "",
        votes: 0,
      },
    };
  },
  methods: {
    post() {
      this.checkForm();
      if (this.checkForm) {
        console.log(this.newPost);
        this.$store.dispatch("createPost", this.newPost);
        this.$store.state.showForm = false;
      }
    },
    handleOnchange(e){
      this.newPost.image =  e.target.files[0]
      this.newPost.imageName = e.target.files[0]['name']
    },
    checkForm() {
      if (
        this.newPost.title &&
        this.newPost.picture &&
        this.newPost.category_id
      ) {
        return true;
      }

      this.errors = [];

      if (!this.newPost.title) {
        this.errors.push("Title required");
      }
      if (!this.newPost.picture) {
        this.errors.push("Picture URL or upload required");
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