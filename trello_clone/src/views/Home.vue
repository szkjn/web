<template>
  <div>
    <div class="home">
      <Lists />
    </div>
    <div v-show="$store.state.showCard">
      <CardDetails />
    </div>
    <div v-show="$store.state.showActions">
      <Actions />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Lists from "@/components/Lists.vue";
import CardDetails from "@/components/CardDetails.vue";
import Actions from "@/components/Actions.vue";

export default {
  name: "Home",
  components: {
    Lists,
    CardDetails,
    Actions,
  },
};
</script>

<style scoped>
div {
  background: url("https://trello-backgrounds.s3.amazonaws.com/SharedBackground/2386x1600/47f09f0e3910259568294477d0bdedac/photo-1576502200916-3808e07386a5.jpg");
  background-size: 2386px 100vh;
  height: 94vh;
  width: 100%;
}
</style>