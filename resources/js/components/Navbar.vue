<template>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
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
          <span class="user">
            {{user.name}}
          </span>
          <a href="#" @click.prevent="signOut" class="btn btn-outline-success my-2 my-sm-0">Sign out</a>
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
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      links: [
        {
          title: "StartPage",
          href: "/",
        },
        {
          title: "Tasks",
          href: "/start",
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

  methods: {
    ...mapActions({
      signOutAction: 'auth/signOut'
    }),

    signOut() {
      this.signOutAction().then(() => {
        this.$router.replace({
          name: 'start'
        })
      })
    }
  }
};
</script>

<style scoped>
.btn-outline-success {
  margin-left: 20px;
  padding: 5px;
}

.user {
  color: beige;
  font-size: 25px;
}
</style>