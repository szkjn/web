<template>
  <div class="comment">
    <div class="child comment-header">
      <div class="username">username</div>
      <div class="time">posted on {{ comment.date.replace("T", " at ") }}</div>
      <!-- <div class="time">{{ timeFromCreation }} days ago</div> -->
    </div>
    <div v-show="!showEdit" class="child comment-body">
      {{ strippedContent }}
    </div>
    <div class="child comment-footer">
      <div @click="toggleEdit" v-show="!showEdit" id="edit">Edit</div>
      <div v-show="!showEdit" @click="deleteComment" id="delete">Delete</div>
    </div>
    <div v-show="showEdit" class="comment-edit">
      <div class="textarea">
        <textarea
          type="text"
          name="commentContent"
          v-model="commentContent"
        ></textarea>
      </div>
      <div class="comment-edit-buttons">
        <button @click="editComment" id="save">Save</button>
        <svg
          @click="toggleEdit"
          id="close"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Comment",
  data() {
    return {
      showEdit: false,
      commentContent: "",
    };
  },
  props: {
    comment: Object,
  },
  computed: {
    strippedContent() {
      let regex = /(<([^>]+)>)/gi;
      let apost = "&#8217;";
      let newStr = this.comment.content.rendered
        .replace(regex, "")
        .replace(apost, "'")
        .replace(apost, "'");
      return newStr;
    },
    timeFromCreation() {
      return this.getTimeFromCreation();
    },
  },
  methods: {
    toggleEdit() {
      this.showEdit = !this.showEdit;
      if (this.showEdit === true) {
        this.commentContent = this.strippedContent;
      }
    },
    editComment() {
      this.$store.state.currentComment = this.comment;
      this.$store.state.currentComment.content.rendered = this.commentContent;
      console.log(
        "updating..." + this.$store.state.currentComment.content.rendered
      );
      this.$store.dispatch("editComment");
      this.toggleEdit();
    },
    deleteComment() {
      this.$store.state.currentComment = this.comment;
      this.$store.dispatch("deleteComment");
    },
  },
};
</script>

<style scoped>
.comment {
  font-size: 0.8rem;
  margin-top: 30px;
}

.comment-body {
  min-height: 30px;
  border: 1px solid #ccc;
  flex: 1;
  padding-left: 10px;
  font-size: 0.9rem;
  text-justify: none;
}
.comment-footer {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}
.child {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  margin: 8px 0;
}
.child div {
  padding-right: 8px;
}
.username {
  font-weight: bold;
}
.time {
  color: #777;
}
#edit,
#delete {
  padding-right: 12px;
  font-size: 0.8rem;
  text-decoration: underline;
  color: #777;
}
#edit:hover,
#delete:hover {
  color: #333;
  cursor: pointer;
}
textarea {
  width: 97%;
  height: 46px;
  padding: 10px;
}
.comment-edit-buttons {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}
.comment-edit-buttons button {
  /* margin-right: 8px; */
  height: 33px;
  border-radius: 3px;
  border: none;
  padding: 0 12px;
  font-size: 0.9rem;
}
#save {
  background: #0079bf;
  color: white;
}
#save:hover {
  background: #026aa7;
  cursor: pointer;
}
#close {
  color: #777;
  background: transparent;
}
#close:hover {
  color: #333;
  cursor: pointer;
}
svg {
  height: 22px;
  padding: 10px;
  margin: 5px;
  border-radius: 100%;
  background: rgba(0, 0, 0, 0);
}

svg:hover {
  background: rgba(0, 0, 0, 0.1);
  cursor: pointer;
}
</style>