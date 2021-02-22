<template>
    <div class="container">

        <h2>ITEMS - Create New</h2> <br>


<form>
  <div class="form-group">
      <label>ITEM NAME</label>
      <input class="form-control" type="text" v-model="name">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit()">ADD ITEM</button>
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
          name: '',
        }
      },
      async submit(){
        const data = {
            name: this.name,
          };
        // const config = { headers: {'Content-Type': 'application/json'} };
        await this.$axios({
          method: 'post',
          url: `/api/item/add/`,
          data: data,
        });
        // const item = await this.$this.$axios.post(`/api/item/add/`, data, config);
        this.$router.push("/items");
      }
    },
}

</script>