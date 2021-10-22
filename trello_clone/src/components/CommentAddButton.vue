<template>
  <div v-if="adding" @click="toggleCommentForm" class="button add">
    <CommentAdd />
  </div>
  <div v-else>
    <CommentAdd />
    <div class="confirmations">
      <input class="button confirm" type="submit" value="Add card" />
      <div @click="toggleCommentForm" class="button cancel">X</div>
    </div>
  </div>
</template>

<script>
import CommentAdd from "./CommentAdd.vue";

export default {
  name: "CommentAddButton",
  data() {
    return {
      adding: true,
    }
  },
  props: {
    cardId: Number
  },
  components: {
    CommentAdd,
  },
  methods: {
    toggleCommentForm() {
       this.adding = !this.adding;
       this.$store.state.currentCard = this.cardId;
      //  console.log('test ' + this.$store.state.currentCard)
    },
  },
};
</script>
<style scoped>
.button {
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
.cancel{
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
