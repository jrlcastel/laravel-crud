<template>
    <div class="container">

        <h2>CASHIERS - Edit</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        <br><br>

<form>
  <div class="form-group">
      <label>CASHIER NAME</label>
      <input class="form-control" type="text" v-model="namee">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit(cashier.id)">UPDATE CASHIER</button>
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
        }
      },
      async submit(id){
        const data = {
            name: this.namee,
          };
        const config = { headers: {'Content-Type': 'application/json'} };
        await axios({
          method: 'put',
          url: `http://localhost:8000/api/cashier/update/${id}`,
          data: data,
        });
        // const cashier = await this.$axios.put(`http://localhost:8000/api/cashier/update/${id}`, data, config);
        this.$router.push("/cashiers");
      }
    },
  async asyncData({params, $axios }) {
    const cashier = await $axios.$get(`http://localhost:8000/api/cashier/${params.id}`)
    const namee = cashier.name
    return { cashier, namee }
  }
}

</script>