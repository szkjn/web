<template>
  <div class="card">
    <textarea
      v-on:blur="addCard"
      v-model="title"
      type="text"
      placeholder="Enter a title for this card..."
    ></textarea>
  </div>
</template>

<script>
export default {
  name: "CardAdd",
  data() {
    return {
      id: "",
      title: "",
      content: "",
      list: "",
      categories: "",
    };
  },
  props: {
    listId: Number,
  },
  methods: {
    addCard() {
      this.$store.dispatch("addCardToList", {
        title: this.title,
        content: this.content,
        listId: this.$props.listId,
        categories: this.$store.state.currentId,
      });
      this.$emit("cardAdded");
    },
  },
  mounted() {
    // console.log(this.$props.listId);
    console.log(this.$store.state.currentList);
  },
};
</script>

<style scoped>
.card {
  background: #fff;
  border-radius: 3px;
  max-width: 92%;
  min-height: 50px;
  padding: 2px 1px;
  margin: 10px auto;
  filter: drop-shadow(0 1px 0 #999);
  display: flex;
}
.card textarea {
  text-align: start;
  box-shadow: none;
  outline: none;
  border: 0;
  display: flex;
  width: 100%;
  padding: 6px;
  font-size: 0.75rem;
}
</style>
