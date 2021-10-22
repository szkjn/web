<template>
  <div class="comments">
    <div v-for="comment in comments" :key="comment.id">
      <Comment :comment="comment" />
    </div>
  </div>
</template>

<script>
import Comment from "./Comment.vue";

export default {
  name: "Comments",
  data() {
    return {
      commentsOfCard: [],
    };
  },
  components: {
    Comment,
  },
  computed: {
    comments() {
      return this.$store.state.comments;
    },
  },
  created() {
    console.log("where are we " + this.$store.state.currentCard.id);
  },
};
</script>

<style>
.comments {
  margin-top: 20px;
}
</style>