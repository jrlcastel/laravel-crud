<template>
    <div class="container">

        <h2>CASHIERS - Create New</h2> <br>


<form>
  <div class="form-group">
      <label>CASHIER NAME</label>
      <input class="form-control" type="text" v-model="name">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit()">ADD CASHIER</button>
        <nuxt-link :to="'/cashiers'" class="btn btn-outline-danger">CANCEL</nuxt-link>
</form>
        



    </div>
</template>

<script>

import axios from 'axios';

export default {
    methods: {
      data() {
        return {
          name: '',
        }
      },
      async submit(){
        const data = {
            name: this.name,
          };
        await axios({
          method: 'post',
          url: 'http://localhost:8000/api/cashier/add/',
          data: data,
        });
        this.$router.push("/cashiers");
      }
    },
}

</script>