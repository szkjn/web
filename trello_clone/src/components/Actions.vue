<template>
  <div>
    <transition name="modal">
      <div class="actions-menu">
        <div class="actions-wrapper">
          <div class="actions-container">
            <div class="list-header">
              <svg
                @click="toggleActions"
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
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
              <div>List actions</div>
            </div>
            <ul>
              <li>Add card...</li>
              <li>Sort by...</li>
              <li
                @click="
                  deleteList();
                  toggleActions();
                "
              >
                Delete this list
              </li>
            </ul>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "Actions",
  props: {
    listId: Number,
  },
  methods: {
    toggleActions() {
      this.$store.state.showActions = !this.$store.state.showActions;
    },
    deleteList() {
      if (confirm("Delete list?")) {
        this.$store.dispatch("deleteList", {
          id: this.$store.state.currentList,
        });
      }
    },
  },
};
</script>

<style scoped>
.list-header {
  border-bottom: 1px solid #ccc;
  padding: 6px 0 12px 0;
  margin: 0 6px;
  color: #888;
  font-size: 0.9rem;
}
.list-header svg:hover {
  color: #333;
  cursor: pointer;
}
ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
li {
  padding: 8px 0;
  margin: 0 6px;
  text-align: start;
  font-size: 0.9rem;
}
li:hover {
  background: #eee;
  cursor: pointer;
}
svg {
  float: right;
  height: 20px;
}
.list-actions-header {
  display: flex;
  align-items: center;
}

.actions-menu {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.actions-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.actions-container {
  width: 272px;
  min-width: 272px;
  margin: 0px auto;
  padding: 6px 10px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}
</style>