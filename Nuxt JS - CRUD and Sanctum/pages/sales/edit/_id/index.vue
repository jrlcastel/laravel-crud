<template>
    <div class="container">

        <h2>SALES - Edit</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        <br><br>


<form>
  <div class="form-group">
      <label>ITEM ID</label>
      <input class="form-control" type="text" name="item_idd" v-model="item_id">
      <br>
      <label>RECEIPT ID</label>
      <input class="form-control" type="text" name="receipt_idd" v-model="receipt_id">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit(sale.id)">UPDATE SALE</button>
        <nuxt-link :to="'/sales'" class="btn btn-outline-danger"> CANCEL</nuxt-link>
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
            item_id: this.item_id,
            receipt_id:  this.receipt_id,
          };
        await this.$axios({
          method: 'put',
          url: `/api/sale/update/${id}`,
          data: data,
        });
        // const config = { headers: {'Content-Type': 'application/json'} };
        // const sale = await this.$this.$axios.put(`/api/sale/update/${id}`, data, config);
        this.$router.push("/sales");
      }
    },
  async asyncData({params}) {
    const sale = await this.$axios.get(`/api/sale/${params.id}`)
    const item_id = sale.item_id
    const receipt_id = sale.receipt_id
    return { sale, item_id, receipt_id }
  }
}

</script>