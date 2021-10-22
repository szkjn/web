<template>
  <div class="lists">
    <div
      v-for="list in lists"
      :key="list.id"
      @drop="onDrop($event, list.id)"
      @dragenter.prevent
      @dragover.prevent
    >
      <List :list="list" />
    </div>
    <ListAddButton />
  </div>
</template>

<script>
import List from "./List.vue";
import ListAddButton from "./ListAddButton.vue";

export default {
  name: "Lists",
  components: {
    List,
    ListAddButton,
  },
  computed: {
    lists() {
      return this.$store.state.lists;
    },
  },
  mounted() {
    this.$store.dispatch("getLists");
  },
  methods: {
    onDrop(event, list) {
      const cardId = event.dataTransfer.getData("cardId");
      console.log("DROPPING card id: " + cardId + " on list n°" + list);
      for (let i = 0; i < this.$store.state.cards.length; i++) {
        if (this.$store.state.cards[i].id == cardId) {
          const card = this.$store.state.cards[i];
          card.categories = list;
          this.$store.state.currentCard = card;
          this.$store.state.currentCategory = card.categories;
          console.log(
            "current categorie : " + this.$store.state.currentCategory
          );
          console.log("current card.id : " + this.$store.state.currentCard.id);
          this.$store.dispatch("updateCardCategorie");
        }
      }
    },
  },
};
</script>

<style scoped>
.lists {
  overflow-x: scroll;
  display: flex;
  justify-content: flex-start;
  flex-wrap: nowrap;
  width: auto;
  padding-top: 52px;
}
.lists div {
  display: inline-block;
  vertical-align: top;
  width: 272px;
  margin: 0 6px 12px 6px;
}
</style>
