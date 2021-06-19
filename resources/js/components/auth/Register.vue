<template>
<div class="container-fluid d-flex h-100 justify-content-center align-items-center">
<div class="text-center">
    <form class="form-signin" @submit.prevent="submit">
      <h1 class="h3 mb-3 font-weight-normal">Registration</h1>
      <label for="inputName" class="sr-only">Name</label>
      <input v-model="form.name" class="form-control" placeholder="Name" required="" autofocus="">
    
      <label for="inputEmail" class="sr-only">Email address</label>
      <input v-model="form.email" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input v-model="form.password" type="password" class="form-control" placeholder="Password" required="">
      <label for="inputPassword" class="sr-only">Password_confirm</label>
      <input v-model="form.password_confirmation" type="password" class="form-control" placeholder="Password_confirm" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
</div>
</div>
</template>

<script>

import {mapActions} from 'vuex'
export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    methods: {
        ...mapActions({
            signUp: 'register/signUp'
        }),
        submit() {
            console.log(this.form)
            this.signUp(this.form)
        }
    }
}
</script>

<style scoped>
input {
    margin-top: 5px;
}
.text-center{
    max-width: 400px;
    align-items: center;
}
</style>