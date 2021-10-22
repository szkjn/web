<template>
  <div>
    <Home />
    <Footer />
  </div>
</template>

<script>
import Home from "./home/Home.vue";
import Footer from "./Footer.vue";

export default {
  components: {
    Home,
    Footer,
  },
};
</script>

<style scoped>
.fixed {
    position: fixed;
    z-index: 2;
}
</style>