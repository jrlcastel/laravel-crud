<template>
    <div class="container">

        <h2>CUSTOMERS - Create New</h2> <br>


<form>
  <div class="form-group">
      <label>CUSTOMER NAME</label>
      <input class="form-control" type="text" v-model="name">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit()">ADD CUSTOMER</button>
        <nuxt-link :to="'/customers'" class="btn btn-outline-danger">CANCEL</nuxt-link>
</form>
        



    </div>
</template>

<script>

import 'axios';

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
        await this.$axios({
          method: 'post',
          url: `/api/customer/add/`,
          data: data,
        });
        // const config = { headers: {'Content-Type': 'application/json'} };
        // const customer = await this.$this.$axios.post(`/api/customer/add/`, data, config);
        this.$router.push("/customers");
      }
    },
}

</script>