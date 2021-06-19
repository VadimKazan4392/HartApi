<template>
  <div>
    <navbar />
    <div class="container">
      <router-view />
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar";

export default {
  components: { Navbar },
};
</script>

<style scoped>
.container {
    margin-top: 70px;
}
</style>