<template>
    <div class="container">

        <h2>SALES - View All</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        &nbsp;&nbsp;&nbsp;
        <nuxt-link :to="'/sales/create/'" class="btn btn-primary btn-sm">Add</nuxt-link>
        <br><br>

        <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>RECEIPT_ID</td>
          <td>ITEM_ID</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <tr v-for="sale in sales" :key="sale.id">
            <td>{{sale.id}}</td>
            <td>{{sale.receipt_id}}</td>
            <td>{{sale.item_id}}</td>
            <td class="text-center">
              
              <nuxt-link :to="'/sales/edit/' + sale.id" class="btn btn-primary btn-sm">Edit</nuxt-link>
              <button type="submit" @click.stop.prevent="del(sale.id)" class="btn btn-danger btn-sm">Delete</button>
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
      edit(id){
        this.$router.push(`/sales/edit/${id}`);
      },
      async del(id) {
        await this.$axios({
          method: 'delete',
          url: `/api/sale/delete/${id}`,
        });
        await this.$nuxt.refresh()
      }
    },
  async asyncData({params, $axios}) {
    const sales = await $axios.$get( `/api/nuxtSales` );
    return { sales }
  }
}

</script>