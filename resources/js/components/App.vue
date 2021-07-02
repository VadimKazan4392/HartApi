<template>
  <div class="pahan">
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
.pahan {
  background-color: rgb(231, 240, 231);
  min-height: 500px;
}
.container {
    margin-top: 56px;
    padding-top: 20px;
    
}
</style>