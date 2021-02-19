<template>
    <div class="container">

        <h2>CUSTOMERS - View All</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        &nbsp;&nbsp;&nbsp;
        <nuxt-link :to="'/customers/create/'" class="btn btn-primary btn-sm">Add</nuxt-link>
        <br><br>

        <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>NAME</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <tr v-for="customer in customers" :key="customer.id">
            <td>{{customer.id}}</td>
            <td>{{customer.name}}</td>
            <td class="text-center">
              <nuxt-link :to="'/customers/edit/' + customer.id" class="btn btn-primary btn-sm">Edit</nuxt-link>
              <button type="submit" @click.stop.prevent="del(customer.id)" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
    </tbody>
  </table>


    </div>
</template>

<script>

import axios from 'axios';

export default {
  methods: {
    async refreshPage(){
      await this.$nuxt.refresh()
    },
    async del(id) {
        await axios({
          method: 'delete',
          url: `http://localhost:8000/api/customer/delete/${id}`,
        });
      // await this.$axios.$delete(`http://localhost:8000/api/customer/delete/${id}`)
      this.$nuxt.refresh()
    },
  },
  async asyncData({ $axios }) {
    const customers = await $axios.$get('http://127.0.0.1:8000/api/nuxtCustomers')
    return { customers }
  }
}

</script>