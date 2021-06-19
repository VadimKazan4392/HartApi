<template>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" v-for="link in links" :key="link.title">
          <router-link exact class="nav-link" :to="link.href">{{
            link.title
          }}</router-link>
        </li>
      </ul>
      <div>
        <template v-if="authentificated">
          {{user.name}}  Logout
        </template>
        <template v-else>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-for="button in buttons" :key="button.title">
              <router-link
                class="btn btn-outline-success my-2 my-sm-0"
                :to="button.href"
                >{{ button.title }}</router-link
              >
            </li>
          </ul>
        </template>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      links: [
        {
          title: "About",
          href: "/about",
        },
        {
          title: "Home",
          href: "/",
        },
      ],
      buttons: [
        {
          title: "Login",
          href: "/login",
        },
        {
          title: "Registration",
          href: "register",
        },
      ],
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
.btn-outline-success {
  margin-left: 20px;
}
</style>