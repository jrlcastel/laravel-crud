<template>
    <div class="container">

        <h2>ITEMS - View All</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        &nbsp;&nbsp;&nbsp;
        <nuxt-link :to="'/items/create/'" class="btn btn-primary btn-sm">Add</nuxt-link>
        <br><br>

        <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <tr v-for="item in items" :key="item.id">
            <td>{{item.id}}</td>
            <td>{{item.name}}</td>
            <td class="text-center">
              <nuxt-link :to="'/items/edit/' + item.id" class="btn btn-primary btn-sm">Edit</nuxt-link>
              <button type="submit" @click.stop.prevent="del(item.id)" class="btn btn-danger btn-sm">Delete</button>
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
          url: `/api/item/delete/${id}`,
        });
      // await this.$this.$axios.$delete(`/api/item/delete/${id}`)
      await this.$nuxt.refresh()
    }
  },
  async asyncData({params, $axios}) {
    const items = await $axios.$get( `/api/nuxtItems` );
    return { items }
  }
}

</script>