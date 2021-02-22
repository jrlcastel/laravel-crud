<template>
    <div class="container">

        <h2>SALES - Create New</h2> <br>


<form>
  <div class="form-group">
      <label>ITEM ID</label>
      <input class="form-control" type="text" name="item_idd" v-model="item_id">
      <br>
      <label>RECEIPT ID</label>
      <input class="form-control" type="text" name="receipt_idd" v-model="receipt_id">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit()">CREATE SALE</button>
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
          item_id: '',
          receipt_id:  ''
        }
      },
      async submit(){
        const data = {
            item_id: this.item_id,
            receipt_id:  this.receipt_id,
          };
        const config = { headers: {'Content-Type': 'application/json'} };
        await this.$axios({
          method: 'post',
          url: `/api/sale/add/`,
          data: data,
        });
        this.$router.push("/sales");
      }
    },
}

</script>