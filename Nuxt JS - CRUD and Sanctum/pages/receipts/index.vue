<template>
    <div class="container">

        <h2>RECEIPTS - View All</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        &nbsp;&nbsp;&nbsp;
        <nuxt-link :to="'/receipts/create/'" class="btn btn-primary btn-sm">Add</nuxt-link>
        <br><br>

        <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>CUSTOMER_ID</td>
          <td>CASHIER_ID</td>
          <td>TOTAL</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <tr v-for="receipt in receipts" :key="receipt.id">
            <td>{{receipt.id}}</td>
            <td>{{receipt.customer_id}}</td>
            <td>{{receipt.cashier_id}}</td>
            <td>{{receipt.total}}</td>
            <td class="text-center">
              <nuxt-link :to="'/receipts/edit/' + receipt.id" class="btn btn-primary btn-sm">Edit</nuxt-link>
              <button type="submit" @click.stop.prevent="del(receipt.id)" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
    </tbody>
  </table>


    </div>
</template>

<script>

import 'axios';

export default {
  methods: {
    async refreshPage(){
      await this.$nuxt.refresh()
    },
    async del(id) {
        await this.$axios({
          method: 'delete',
          url: `/api/receipt/delete/${id}`,
        });
      // await this.$this.$axios.$delete(`/api/receipt/delete/${id}`)
      await this.$nuxt.refresh()
    }
  },
  async asyncData({params, $axios}) {
    const receipts = await $axios.$get( `/api/nuxtReceipts` );
    return { receipts }
  }
}

</script>