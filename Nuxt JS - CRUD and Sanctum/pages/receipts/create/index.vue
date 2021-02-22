<template>
    <div class="container">

        <h2>RECEIPTS - Create New</h2> <br>


<form>
  <div class="form-group">
      <label>CUSTOMER ID</label>
      <input class="form-control" type="text" v-model="customer_id"> <br>
      <label>CASHIER ID</label>
      <input class="form-control" type="text" v-model="cashier_id"> <br>
      <label>TOTAL</label>
      <input class="form-control" type="text" v-model="total"> <br>
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit()">ADD ITEM</button>
        <nuxt-link :to="'/receipts'" class="btn btn-outline-danger">CANCEL</nuxt-link>
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
      async submit(){
        const data = {
            customer_id: this.customer_id,
            cashier_id: this.cashier_id,
            total: this.total,
          };
        await this.$axios({
          method: 'post',
          url: `/api/receipt/add/`,
          data: data,
        });
        // const config = { headers: {'Content-Type': 'application/json'} };
        // const item = await this.$this.$axios.post(`/api/receipt/add/`, data, config);
        this.$router.push("/receipts");
      }
    },
}

</script>