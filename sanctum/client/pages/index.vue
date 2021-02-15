
<template>

        
  <div class="form-group">

            LOGIN
            <br> <br> 

        <div class="form-group mx-sm-3 mb-2">
          <label>Username: user1@website.com</label>
          <input class="form-control" type="text" v-model="email">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label>Password: user1</label>
            <input class="form-control" type="text" v-model="password">
        </div>

        <b-button variant="primary" @click="login()">Login</b-button>

        <br> <br> 
        <!-- <div v-if="err" class="alert alert-danger">Please Try again</div> -->

  </div>

</template>

<script>
export default {
    middleware: ["guest"],
    methods: {
      data() {
        return {
            email: '',
            password: '',
        }
      },
      async login() {
          console.log('Login method invoked.');
          try{
            console.log("Trying to log in...");
            await this.$auth.loginWith('laravelSanctum', {
                data: {
                    email: this.email,
                    password: this.password
                }
            })
            if (this.$auth.loggedIn) {
              console.log("Logged in.");
              this.$router.push(`/home`);
            }
          } catch (error) {
            console.log(error)
          } 
      },
    },
  async asyncData() {
    const email = ''
    const password = ''
    const err = false
    return { email, password, err }
  }
}
</script>