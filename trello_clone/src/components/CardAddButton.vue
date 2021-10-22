<template>
  <div v-if="adding" @click="toggleCardForm" class="button add">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M12 4v16m8-8H4"
      />
    </svg>
    <p>Add a card</p>
  </div>
  <div v-else>
    <CardAdd :listId="listId" />
    <div class="confirmations">
      <input
        class="button confirm"
        type="submit"
        value="Add card"
        @click="toggleCardForm"
      />
      <svg
        @click="toggleCardForm"
        xmlns="http://www.w3.org/2000/svg"
        class="button cancel"
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
</template>

<script>
import CardAdd from "./CardAdd.vue";

export default {
  name: "CardAddButton",
  data() {
    return {
      adding: true,
    };
  },
  props: {
    listId: Number,
  },
  components: {
    CardAdd,
  },
  methods: {
    toggleCardForm() {
      this.adding = !this.adding;
      this.$store.state.currentList = this.listId;
      //  console.log('test ' + this.$store.state.currentList)
    },
  },
};
</script>
<style scoped>
.button {
  text-align: start;
  margin: 0 0 10px 10px;
  padding: 5px;
  color: white;
  border-radius: 3px;
  border: 0;
  font-size: 0.9rem;
}
svg {
  height: 18px;
  padding: 0 5px;
}
.confirmations {
  display: flex;
}
.cancel {
  text-align: center;
  color: grey;
  height: 24px;
  margin-left: 4px;
}
.cancel:hover {
  color: #333;
  cursor: pointer;
}
.add {
  display: flex;
  align-items: center;
  background-color: none;
  color: grey;
  height: 22px;
  width: 89%;
}
.add:hover {
  background-color: rgb(223, 223, 223);
  cursor: pointer;
  color: #333;
}
.confirm {
  text-align: center;
  background-color: #1980c5;
  padding: 8px 10px;
}
.confirm:hover {
  background-color: #136eac;
  cursor: pointer;
}
</style>
