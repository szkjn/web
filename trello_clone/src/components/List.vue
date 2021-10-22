<template>
  <div class="list" @card-added="toggleCardForm">
    <div class="list-header">
      <h3 v-if="!listClicked" @click="listClicked = true">
        {{ list.name }}
      </h3>
      <input
        v-else
        type="text"
        name="newListName"
        v-model="newListName"
        @keyup.enter="
          updateListName();
          listClicked = false;
        "
        v-click-away="onClickAway"
      />
      <svg
        @click="toggleActions"
        :listId="list.id"
        xmlns="http://www.w3.org/2000/svg"
        class="actions"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
        />
      </svg>
    </div>
    <Cards :listId="listId" />
    <CardAddButton :listId="list.id" />
  </div>
</template>

<script>
import Cards from "./Cards.vue";
import CardAddButton from "./CardAddButton.vue";
import { mixin as VueClickAway } from "vue3-click-away";

export default {
  name: "List",
  mixins: [VueClickAway],
  data() {
    return {
      listId: this.list.id,
      listClicked: false,
      newListName: this.list.name,
      
    };
  },
  props: {
    list: Object,
  },
  components: {
    Cards,
    CardAddButton,
  },
  methods: {
    toggleActions() {
      this.$store.state.showActions = !this.$store.state.showActions;
      // this.$store.state.currentList = this.listId;
      for (let i = 0; i < this.$store.state.lists.length; i++) {
        // console.log(this.$store.state.lists[i].id);
        if (this.listId === this.$store.state.lists[i].id) {
          this.$store.state.currentList = this.$store.state.lists[i];
        }
      }
      // console.log(this.$store.state.currentList);
    },
    updateListName() {
      console.log(this.listId);
      for (let i = 0; i < this.$store.state.lists.length; i++) {
        // console.log(this.$store.state.lists[i].id);
        if (this.listId === this.$store.state.lists[i].id) {
          this.$store.state.currentList = this.$store.state.lists[i];
          this.$store.state.currentList.name = this.newListName;
          // console.log(this.$store.state.currentList.name);
          this.$store.dispatch("updateList");
        }
      }
    },
    onClickAway() {
      this.listClicked = false;
    }
  },
  mounted() {
    this.$store.dispatch("getLists");
  },
};
</script>

<style scoped>
.list {
  background: #eee;
  border-radius: 3px;
}
h3, input {
  margin: 0;
  font-family: sans-serif;
  font-size: 0.95rem;
  text-align: left;
}
.list-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 6px 10px 0 20px;
}
.list-header svg {
  /* opacity: 0.5; */
  height: 18px;
  padding: 6px;
  border-radius: 2px;
  color: #777;
}
.list-header svg:hover {
  background: #ddd;
  color: #333;
}
.actions {
  cursor: pointer;
}
</style>
