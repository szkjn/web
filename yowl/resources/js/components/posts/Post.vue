<template>
  <div>
    <div class="d-flex flex-row p-0">
      <div
        id="big"
        class="p-2 border-right d-flex flex-column align-items-center"
      >
        <div @click="upvote">
          <svg
            fill="white"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="thumb up"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
            />
          </svg>
        </div>
        <div class="py-2">
          <p class="font-weight-bold my-0 disable-select">{{ post.votes }}</p>
        </div>
        <div @click="downvote">
          <svg
            fill="white"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="thumb down"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"
            />
          </svg>
        </div>
      </div>

      <div class="m-0 p-0 w-100 h-100">
        <div class="d-flex flex-row justify-content-between p-2">
          <div class="d-flex flex-row align-items-center justify-content-start">
            <svg class="mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path
                fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                clip-rule="evenodd"
              />
            </svg>
            <p class="mr-2 m-0 font-weight-bold">
              {{fetchUsername(post.user_id) }}
            </p>
            <p class="mr-1 m-0">
              <span class="roboto-classic">posted from</span>
              <a href="#">Source</a>
            </p>
          </div>
          <div>
            <p class="m-0 px-1">{{ post.created_at.substring(0, 10) }}</p>
          </div>
        </div>

        <h4 @click="setCurrentPost" id="setCurrentPost" class="m-0 px-2 pb-2">
          {{ post.title }}
        </h4>

        <div class="pb-2">
          <div
            class="btn border rounded-pill text-center text-muted py-0 m-0 mx-2"
          >
            {{fetchCatname(post.category_id)}}
          </div>
        </div>
      </div>
    </div>
    <div>
      <img
        :src="getImage(post.picture)"
        alt=""
        class="w-100"
        @click="setCurrentPost"
        id="setCurrentPost"
      />
    </div>
    <div
      class="d-flex flex-row align-items-center p-2"
      @click="setCurrentPost"
      id="post-footer">
      <div id="big">
        <svg class="mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
          />
        </svg>
      </div>
      <div class ="comment-counter"> 
        {{ getFilteredComments(post.id).length }}  
        <div v-if="getFilteredComments(post.id).length == 1">
           Comment
        </div>
        <div v-else>
           Comments
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  name: "Post",
  
  props: {
    post: Object,
  },

  created(){
    this.currentPost = this.post;
    this.$store.dispatch("fetchComments");
    // console.log(this.currentPost);
  },

  computed: {
    getComments(){
      return this.$store.state.comments;
    }
  },
    
  methods: {
    setCurrentPost() {
      this.$store.state.currentPost = this.post; 
      this.showPostDetails();
      
    },
    showPostDetails() {
      this.$store.state.showPost = true;
      this.$store.state.fixedNav = false;
    },
    upvote() {
      this.post.votes++;
      // console.log(this.post.votes);
      this.$store.state.currentPost = this.post;
      this.$store.dispatch("updateVotes");
    },
    downvote() {
      this.post.votes--;
      // console.log(this.post.votes);
      this.$store.state.currentPost = this.post;
      this.$store.dispatch("updateVotes");
    },

    fetchUsername(id){
      return this.$store.state.users.find((x) => x.id === id)
      .name;
    },

    fetchCatname(id){
      return this.$store.state.categories.find((x) => x.id === id)
      .name;
    },
    
    getFilteredComments(id){
      return this.getComments.filter(comment=>comment.post_id==id)
    },

     getImage(imgName){
      if(imgName.substring(0,4) == "http"){
          return imgName
      }else{
           return "images/"+imgName;
      }

    }
  },
};
</script>

<style scoped>
#big svg {
  width: 22px;
  cursor: pointer;
}
#setCurrentPost {
  cursor: pointer;
}
#setCurrentPost:hover {
  text-decoration: underline;
}
#post-footer:hover {
  background: #fbe165;
  cursor: pointer;
  transition-duration: 0.2s;
}
</style>