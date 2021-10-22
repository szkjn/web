<template>
  <div class="cards">
    <div
      v-for="card in cards"
      :key="card.id"
      class="card"
      draggable="true"
      @dragstart="startDrag($event, card)"
    >
      <Card :card="card" />
    </div>
  </div>
</template>

<script>
import Card from "@/components/Card.vue";

export default {
  name: "Cards",
  components: {
    Card,
  },
  props: {
    listId: Number,
  },
  computed: {
    cards() {
      // return this.$store.state.cards;
      return this.$store.getters.getCardsByList(this.$props.listId);
    },
  },
  mounted() {
    this.$store.dispatch("getCards");
  },
  methods: {
    startDrag(event, card) {
      console.log('DRAGGING card id: ' + card.id + ' from list n°' + card.categories)
      event.dataTransfer.dropEffect = 'move';
      event.dataTransfer.effectAllowed = 'move';
      event.dataTransfer.setData('cardId', card.id);
    }
  }
};
</script>

<style scoped>
.cards {
  padding-bottom: 8px;
}
.card {
  cursor: pointer;
}
</style>
