<template>
  <div
    @click="showCardById"
    @mouseover="hover = true"
    @mouseleave="hover = false"
    class="card"
  >
    <div class="card-header">
      <h3>{{ strippedContent }}</h3>
      <svg
        :class="{ active: hover }"
        class="edit"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
        />
      </svg>
    </div>
    <div v-show="card.content.rendered" class="desc">
      <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16M4 18h7"
        />
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
  computed: {
    strippedContent() {
      let apost = "&#8217;";
      let newStr = this.card.title.rendered
        .replace(apost, "'");
      return newStr;
    },
  },
  data() {
    return {
      hover: false,
      description: false,
    };
  },
  props: {
    card: Object,
  },
  methods: {
    showCardById() {
      this.$store.state.showCard = true;
      this.$store.state.currentCard = this.card;
      let j = this.$store.state.currentCard.categories[0];

      for (let i = 0; i < this.$store.state.lists.length; i++) {
        // console.log(this.$store.state.lists[i].id);
        if (this.$store.state.lists[i].id === j) {
          // let listName = this.$store.state.lists[i].name;
          // console.log(test);
          this.$store.state.currentList = this.$store.state.lists[i];
          // console.log(this.$store.state.currentList);
        }
      }

      this.$store.dispatch("getCommentsByPost");
    },
  },
};
</script>

<style scoped>
.card {
  background: #fff;
  border-radius: 3px;
  max-width: 92%;
  min-height: 30px;
  padding: 2px;
  margin: 10px 10px 0 10px;
  filter: drop-shadow(0 1px 0 #999);
}
.card:hover {
  background: #fafafa;
}
.card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
h3 {
  padding: 2px 8px;
  padding-bottom: 0;
  font-size: 0.95rem;
  font-family: sans-serif;
  text-align: left;
  font-weight: 500;
  margin: 0;
}
svg {
  height: 15px;
  padding: 7px;
}
.edit {
  border-radius: 3px;
  margin: 0;
  color: transparent;
}
.active {
  color: #333;
}
.active:hover {
  background: #eee;
}
.desc {
  display: flex;
  padding-left: 4px;
  padding-bottom: 4px;
}
</style>
