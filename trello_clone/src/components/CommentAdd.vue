<template>
  <div class="card-comment-body">
    <input
      v-on:blur="addComment"
      v-model="message"
      type="text"
      placeholder="Write a comment..."
      @keyup.enter="addComment"
    />
  </div>
</template>

<script>
export default {
  name: "CommentAdd",
  data() {
    return {
      id: "",
      content: "",
      list: "",
      categories: "",
      message: ""
    };
  },
  props: {
    cardId: Number,
  },
  methods: {
    addComment() {
      console.log(this.message);
      console.log(this.$store.state.currentCard.title.rendered);

      this.$store.state.newComment = this.message;
      this.message = '';

      this.$store.dispatch("addCommentToCard"
      // ,{
      //   content: this.content,
      //   cardId: this.$store.state.currentCard.id,
      //   categories: this.$store.state.currentId,
      // }
      );
    },
  },
  mounted() {
    // console.log(this.$props.listId);
    console.log(this.$store.state.currentCard);
  },
};
</script>

<style scoped>
.card-comment-body {
  display: flex;
  align-items: center;
}

.card-comment-body div {
  border-radius: 100%;
  border: 1px solid #ccc;
  height: 33px;
  width: 33px;
  margin-right: 10px;
}

.card-comment-body input {
  height: 30px;
  border: 1px solid #ccc;
  flex: 1;
  padding-left: 10px;
  font-size: 1rem;
}
.button {
  display: flex;
  width: 89%;
  text-align: start;
  margin: 0 0 5px 10px;
  padding: 5px;
  color: white;
  border-radius: 3px;
  border: 0;
}
.button:hover {
  cursor: pointer;
}
.confirmations {
  display: flex;
}
.cancel {
  text-align: center;
  background-color: none;
  color: grey;
  width: 1rem;
}
.cancel:hover {
  background-color: rgb(223, 223, 223);
}
.add {
  background-color: none;
  color: grey;
}
.add:hover {
  background-color: rgb(223, 223, 223);
}
.confirm {
  text-align: center;
  width: 4.5rem;
  background: #1980c5;
}
.confirm:hover {
  background-color: #136eac;
}
</style>
