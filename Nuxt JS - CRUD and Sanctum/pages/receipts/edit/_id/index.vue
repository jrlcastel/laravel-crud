<template>
    <div class="container">

        <h2>RECEIPTS - Edit</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        <br><br>

<form>
  <div class="form-group">
      <label>CUSTOMER ID</label>
      <input class="form-control" type="text" v-model="customer_id"> <br>
      <label>CASHIER ID</label>
      <input class="form-control" type="text" v-model="cashier_id"> <br>
      <label>TOTAL</label>
      <input class="form-control" type="text" v-model="total"> <br>
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit(receipt.id)">UPDATE ITEM</button>
        <nuxt-link :to="'/items'" class="btn btn-outline-danger">CANCEL</nuxt-link>
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
            customer_id: this.customer_id,
            cashier_id: this.cashier_id,
            total: this.total,
          };
        await axios({
          method: 'put',
          url: `http://localhost:8000/api/receipt/update/${id}`,
          data: data,
        });
        // const config = { headers: {'Content-Type': 'application/json'} };
        // const receipt = await this.$axios.put(`http://localhost:8000/api/receipt/update/${id}`, data, config);
        this.$router.push("/receipts");
      }
    },
  async asyncData({params, $axios }) {
    const receipt = await $axios.$get(`http://localhost:8000/api/receipt/${params.id}`)
    const customer_id = receipt.customer_id
    const cashier_id = receipt.cashier_id
    const total = receipt.total
    return { receipt, customer_id, cashier_id, total }
  }
}

</script>