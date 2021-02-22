<template>
    <div class="container">

        <h2>ITEMS - Edit</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        <br><br>

<form>
  <div class="form-group">
      <label>ITEM NAME</label>
      <input class="form-control" type="text" v-model="namee">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit(item.id)">UPDATE ITEM</button>
        <nuxt-link :to="'/items'" class="btn btn-outline-danger">CANCEL</nuxt-link>
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
          url: `/api/item/update/${id}`,
          data: data,
        });
        // const config = { headers: {'Content-Type': 'application/json'} };
        // const item = await this.$this.$axios.put(`/api/item/update/${id}`, data, config);
        this.$router.push("/items");
      }
    },
  async asyncData({params, $axios}) {
    const item = await $axios.$get(`/api/item/${params.id}`)
    const namee = item.name
    return { item, namee }
  }
}

</script>