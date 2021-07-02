<template>
  <div>
    <template v-if="authentificated">
      <div class="px-4 py-5 my-5 text-center">
         <h1 class="display-5 fw-bold">We greet you in our application</h1>
         <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
           <router-link
              exact
              :to="start.href"
              type="button"
              class="btn btn-success btn-lg px-4 gap-3"
            >
              Click to start
            </router-link>
         </div>
      </div>
    </template>
    <template v-else>
      <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">We greet you in our application</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">
            we make sure everything is organized and taken into account so that
            you can succeed in the things that matter to you.
          </p>
          <p>You can:</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <router-link
              exact
              :to="login.href"
              type="button"
              class="btn btn-success btn-lg px-4 gap-3"
            >
              {{ login.title }}
            </router-link>
            <p class="or">or</p>
            <router-link
              :to="register.href"
              type="button"
              class="btn btn-outline-success btn-lg px-4"
            >
              {{ register.title }}
            </router-link>
          </div>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      login: {
        title: "Login",
        href: "/login",
      },
      register: {
        title: "Register",
        href: "/register",
      },
      start: {
        href: "/start"
      }
    };
  },
  computed: {
    ...mapGetters({
      authentificated: "auth/authentificated",
      user: "auth/user",
    }),
  },
};
</script>

<style scoped>
.or {
  margin: 10px 10px;
}
</style>