<template>
  <div class="">
    <div
      class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white"
      style="width: 380px"
    >
      <div href="/" class="text-white bg-yowl roboto p-3 align-items-center rounded-top">
        <h5 class="p-0 m-0 mono">Categories</h5>
      </div>
      <div class="d-flex flex-row flex-wrap justify-content-start m-2">
        <button
          v-for="category in $store.state.categories"
          :key="category.id"
          class="btn border rounded-pill text-center text-muted py-0 m-1"
          type="submit"
        >
          <a><router-link :to="{name: 'Category', params: {id: category.id}}">{{ category.name }}</router-link></a>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Categories",
};
</script>

<style>
</style>