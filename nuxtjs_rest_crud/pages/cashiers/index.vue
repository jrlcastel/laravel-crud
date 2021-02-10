<template>
    <div class="container">

        <h2>CASHIERS - View All</h2> <br>
        <button type="submit" @click.stop.prevent="refreshPage()" class="btn btn-primary btn-sm">Refresh</button>
        &nbsp;&nbsp;&nbsp;
        <nuxt-link :to="'/cashiers/create/'" class="btn btn-primary btn-sm">Add</nuxt-link>
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
        <tr v-for="cashier in cashiers" :key="cashier.id">
            <td>{{cashier.id}}</td>
            <td>{{cashier.name}}</td>
            <td class="text-center">
              <nuxt-link :to="'/cashiers/edit/' + cashier.id" class="btn btn-primary btn-sm">Edit</nuxt-link>
              <button type="submit" @click.stop.prevent="del(cashier.id)" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
    </tbody>
  </table>


    </div>
</template>

<script>


export default {
    methods: {
      async refreshPage(){
        await this.$nuxt.refresh()
      },
      async del(id) {
        await this.$axios.$delete(`http://localhost:8000/api/cashier/delete/${id}`)
        await this.$nuxt.refresh()
      }
    },
  async asyncData({ $axios }) {
    const cashiers = await $axios.$get('http://127.0.0.1:8000/api/cashiers')
    return { cashiers }
  }
}

</script>