<template>
  <div v-if="adding" @click="toggleListForm" class="button add">
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
    <p>Add another list</p>
  </div>
  <div v-else>
    <div class="listAdd">
      <ListAdd />
      <div class="confirmations">
        <input
          class="button confirm"
          type="submit"
          value="Add list"
          @click="toggleListForm"
        />
        <svg
          @click="toggleListForm"
          xmlns="http://www.w3.org/2000/svg"
          class="button cancel h-6 w-6"
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
import ListAdd from "./ListAdd.vue";

export default {
  name: "ListAddButton",
  data() {
    return {
      adding: true,
    };
  },
  components: {
    ListAdd,
  },
  methods: {
    toggleListForm() {
      this.adding = !this.adding;
    },
  },
};
</script>
<style scoped>
.listAdd {
  text-align: center;
  width: 272px;
  padding: 5px;
  color: white;
  background: #eee;
  border-radius: 3px;
  border: 0;
  margin-left: 7px;
}
.listAdd:hover {
  cursor: pointer;
}
.button.add {
  width: 272px;
  min-width: 272px;
  margin-left: 12px;
  height: 30px;
  display: flex;
  align-items: center;
  font-size: 0.9rem;
}
.button {
  height: 100%;
  text-align: start;
  margin-right: 5px;
  padding: 5px;
  color: white;
  border-radius: 3px;
  border: 0;
}
.button:hover {
  cursor: pointer;
}
svg {
  height: 18px;
  padding: 0 5px;
}
.confirmations {
  display: flex;
}
.cancel,
.delete {
  text-align: center;
  background-color: none;
  color: grey;
  width: 1rem;
}
.cancel:hover {
  background-color: rgb(223, 223, 223);
}
.confirm {
  text-align: center;
  width: 4rem;
  background: #1980c5;
}
.confirm:hover {
  background-color: #136eac;
}
.add {
  text-align: center;
  background: #000;
  opacity: 0.3;
}
.add:hover {
  opacity: 0.4;
}
</style>
