<template>
    <div class="container">

        <h2>CUSTOMERS - Edit</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        <br><br>

<form>
  <div class="form-group">
      <label>CUSTOMER NAME</label>
      <input class="form-control" type="text" v-model="namee">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit(customer.id)">UPDATE CUSTOMER</button>
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
        }
      },
      async submit(id){
        const data = {
            name: this.namee,
          };
        await this.$axios({
          method: 'put',
          url: `/api/customer/update/${id}`,
          data: data,
        });
        // const config = { headers: {'Content-Type': 'application/json'} };
        // const customer = await this.$this.$axios.put(`/api/customer/update/${id}`, data, config);
        this.$router.push("/customers");
      }
    },
  async asyncData({params}) {
    const customer = await $this.$axios.get(`/api/customer/${params.id}`)
    const namee = customer.name
    return { customer, namee }
  }
}

</script>