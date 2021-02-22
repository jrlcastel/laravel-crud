<template>

  <center>
    <div class="form-group">

      <br> <br>
      LOGIN
      <br> <br>
      For convenience, please see console for output messages.
      <br> <br> <br>

      <b-button variant="primary" @click="loginnn()">Login</b-button>
      &nbsp; &nbsp; &nbsp; 
      <b-button variant="primary" @click="loginAndRedirect()">Login & Redirect</b-button>
      &nbsp; &nbsp; &nbsp; 
      <b-button variant="warning" @click="inValidLogin()">Invalid Login</b-button>
      <br/> <br/> <br/> <br/> 
      <b-button variant="danger" @click="logout()">Logout</b-button>

    </div>
  </center>

</template>

<script>
// import this.$axios from 'this.$axios';
import 'axios';
import Vue from 'vue'
import VueRouter from 'vue-router'

export default {
    methods: {
      data() {
        return {
            email: '',
            password: '',
        }
      },
      loggedIn() {
        console.log('sdfdsfdsfdfdfdsfd');
        Vue.use(require('vue-cookies'))
        if (Vue.$cookies.get('userToken')==null) return false;
        else if(Vue.$cookies.get('userToken')=='') return false;
        else return true;
      },
      invalidLogin() {
        Vue.use(require('vue-cookies'))
        if(Vue.$cookies.get('invalidLogin')==null) return false
        if(Vue.$cookies.get('invalidLogin')=='1') return true
        else return false;
      },
      async logout() {

        Vue.use(VueRouter)
        Vue.use(require('vue-cookies'))

        console.log(`Bearer ${Vue.$cookies.get('userToken')}`);
        
        try {
          console.log('Trying to logout. Please wait...');
          await this.$axios({
              method: 'post',
              url: '/api/logout',
              headers: {
                'Authorization': `Bearer ${Vue.$cookies.get('userToken')}` 
              },
          });

          console.log('Successful log out.');
          Vue.$cookies.set('userToken', '');

          } catch (e) {

          console.log('Logout failed...');
          console.log(e);

          }
        },
      async loginnn() {

          Vue.use(VueRouter)
          Vue.use(require('vue-cookies'))

          console.log('Login method invoked.');


          const loginData = {
              email: "user1@website.com",
              password: "user1"
            }

            try {
              console.log('Trying to login. Please wait...');
              const res = await this.$axios({
                // baseURL: process.env.BASE_URL,
                method: 'post',
                url: '/api/sanctum/token',
                data: loginData,
              });
              
              console.log('Login Successful.');
              Vue.$cookies.set('userToken', res.data.token);
              this.$router.push('/')

            } catch (e) {
              Vue.$cookies.set('userToken', '');
              console.log('Login Failed.');
              console.log(e);
              this.$router.push('/')
            }
            
      },
      async loginAndRedirect() {

          Vue.use(VueRouter)
          Vue.use(require('vue-cookies'))

          console.log('Login method invoked.');

          const loginData = {
              email: "user1@website.com",
              password: "user1"
            }

            try {
              console.log('Trying to login. Please wait...');
              const res = await this.$axios({
                method: 'post',
                url: '/api/sanctum/token',
                data: loginData,
              });
              
              console.log('Login Successful.');
              Vue.$cookies.set('userToken', res.data.token);
              this.$router.push('/sales')

            } catch (e) {
              Vue.$cookies.set('userToken', '');
              console.log('Login Failed.');
              console.log(e);
              this.$router.push('/')
            }
            
      },
      async inValidLogin() {

          Vue.use(VueRouter)
          Vue.use(require('vue-cookies'))

          console.log('Login method invoked.');

          const loginData = {
              email: "wrongemail@website.com",
              password: "wrongpass"
            }


            try {
              console.log('Trying to login. Please wait...');
              const res = await this.$axios({
                method: 'post',
                url: '/api/sanctum/token',
                data: loginData,
              });
              
              console.log('Login Successful.');
              Vue.$cookies.set('userToken', res.data.token);
              this.$router.push('/')

            } catch (e) {
              Vue.$cookies.set('userToken', '');
              console.log('Login Failed.');
              console.log(e);
              this.$router.push('/')
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