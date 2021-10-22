<template>
  <div v-if="$store.state.showPost">
    <transition name="modal">
      <div class="card-mask">
        <div class="card-wrapper">
          <div class="card-container" v-on-clickaway="hidePostDetails">
            <body class="d-flex flex-column">
              <div>
                <div @click="hidePostDetails" id="close">
                  <svg
                    class="m-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                </div>
                <img
                  :src="$store.state.currentPost.picture"
                  alt=""
                  class="w-100"
                />
              </div>
              <div class="d-flex flex-row">
                <div
                  class="p-2 border-right d-flex flex-column align-items-center"
                >
                  <div @click="upvote" class="thumb up">
                    <svg fill="white" viewBox="0 0 24 40" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
                      />
                    </svg>
                  </div>
                  <div>
                    <p class="font-weight-bold">
                      {{ $store.state.currentPost.votes }}
                    </p>
                  </div>
                  <div @click="downvote" class="thumb down">
                    <svg fill="white" viewBox="0 0 24 40" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"
                      />
                    </svg>
                  </div>
                </div>
                <div class="w-100">
                  <div
                    class="
                      d-flex
                      flex-row
                      align-items-center
                      justify-content-start
                      p-2
                      h-auto
                      border-bottom
                    "
                  >
                    <svg
                      class="mr-1 py-0 my-0"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    <p class="mr-1 mb-0 font-weight-bold">
                      {{
                        $store.state.users.find(
                          (x) => x.id === $store.state.currentPost.user_id
                        ).name
                      }}
                      
                    </p>
                    
                    <p class="mb-0">
                      <span class="roboto-classic">posted from </span><a href="#">Source</a></p>
                  </div>

                  <div class="card-title px-2 pt-2 my-0">
                    <h2>
                      {{ $store.state.currentPost.title }}
                    </h2>
                  </div>

                  <div class="px-2 my-2">
                    {{ $store.state.currentPost.content }}
                  </div>

                  <div
                    class="
                      btn
                      border
                      rounded-pill
                      text-center text-muted
                      py-0
                      mx-2
                    "
                  >
                    {{
                      $store.state.categories.find(
                        (x) => x.id === $store.state.currentPost.category_id
                      ).name
                    }}
                  </div>
                  <div class="card-comment w-100 p-2 mt-2">
                    <div class="comment-input rounded bg-light">
                      <p class="px-2 pt-1 m-0 roboto-classic">comment as user123</p>
                      <div class="px-2 pb-2">
                        <textarea
                          class="form-control px-2"
                          name="comment-input"
                          v-model="comment.comment"
                          placeholder="What are your thoughts?"
                        ></textarea>
                      </div>
                      <div class="d-flex justify-content-end px-2 pb-2">
                        <button @click="createComment"
                          class="btn bg-yowl-light rounded-pill py-0 text-white"
                        >
                          Comment
                        </button>
                      </div>
                    </div>

                    <div class="border border-primary rounded p-2 mt-2">
                      <div class="d-flex flex-row align-items-center">
                        <p class="mr-1 mb-0 font-weight-bold">Comments</p>
                      </div>
                       {{getFilteredComments($store.state.currentPost.id)}}
                      <div v-for="comment in filteredComments" :key="comment.id">
                      <Comment :comments="comment"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </body>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import { mixin as clickaway } from "vue-clickaway";
import Comment from '../comments/Comment.vue';

export default {

   components: {
    Comment,
  },
  mixins: [clickaway],

  data() {
    return {
        comment: {
        },
        filteredComments:"",
    }
  },

  created(){
    this.currentPost = this.post;
    this.$store.dispatch("fetchComments");
  },

  computed: {
    getComments(){
      return this.$store.state.comments;
    }
  },

  methods: {

    hidePostDetails() {
      this.$store.state.showPost = false;
      this.$store.state.fixedNav = true;
    },
    upvote() {
      this.$store.state.currentPost.votes++;
      this.$store.dispatch("updateVotes");
    },
    downvote() {
      this.$store.state.currentPost.votes--;
      this.$store.dispatch("updateVotes");
    },

    createComment() {
      this.comment.users_id = "2";
      this.comment.post_id = this.$store.state.currentPost.id
      axios
        .post('http://localhost:8000/api/comment/store',this.comment)
        .then(res => {
            console.log(res);
        })
        .catch(error => {
            console.log(error);
        });
    },

    getFilteredComments(id){
      this.filteredComments = this.getComments.filter(comment=>comment.post_id==id)
    },
    
  },
};
</script>

<style scoped>
body {
  background: #ddd;
}
a {
  color: #666;
}
a:hover {
  cursor: pointer;
  color: #333;
}
h2,
.title {
  font-size: 1.4rem;
  padding: 0;
  margin: 0;
}
svg {
  width: 25px;
}
#close svg {
  position: absolute;
  width: 35px;
  color: #eee;
}
#close svg:hover {
  cursor: pointer;
  color: #ccc;
}

.card-mask {
  position: fixed;
  /* z-index: 9998; */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.card-wrapper {
  display: table-cell;
  vertical-align: middle;
  height: auto;
}

.card-container {
  width: 92vw;
  max-width: 750px;
  margin: 10px auto;
  background-color: #fff;
  border-radius: 3px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
  height: 80%;
  overflow-y: scroll;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.card-container::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.card-container {
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}

header {
  background: orange;
  height: 120px;
  opacity: 0.5;
  display: flex;
  flex-direction: row-reverse;
}

body {
  background-color: inherit;
  /* padding: 20px 10px; */
}

.card-title {
  display: flex;
  align-items: center;
  text-align: left;
  font-weight: bold;
  font-size: 1.25rem;
}

.card-comment-header {
  display: flex;
  align-items: center;
}

/*
 * The following styles are auto-applied to elements with
 * transition="card" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the card transition by editing
 * these styles.
 */

.card-enter {
  opacity: 0;
}

.card-leave-active {
  opacity: 0;
}

.card-enter .card-container,
.card-leave-active .card-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>