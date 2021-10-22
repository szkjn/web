<template>
  <div>
    <input
      class="inputTitle"
      v-on:blur="listAdd"
      v-model="name"
      type="text"
      placeholder="Enter list title..."
    />
  </div>
</template>

<script>
export default {
  name: "CardAdd",
  data() {
    return {
      id: "",
      name: "",
      slug: "",
    };
  },
  methods: {
    listAdd() {
      this.$store.dispatch("addList", { name: this.name, slug: this.slug });
      this.$emit("listAdded");
    },
  },
};
</script>

<style scoped>
.inputTitle {
  text-align: start;
  box-shadow: none;
  outline: none;
  border-color: #136eac;
  border-radius: 3px;
  width: 92%;
  padding: 7px 8px;
  margin-bottom: 5px;
}
</style>
