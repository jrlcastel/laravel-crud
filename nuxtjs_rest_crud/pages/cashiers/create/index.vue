<template>
    <div class="container">

        <h2>CASHIERS - Create New</h2> <br>


<form>
  <div class="form-group">
      <label>CASHIER NAME</label>
      <input class="form-control" type="text" v-model="name">
  </div>
        <button class="btn btn-primary" type="submit" @click.stop.prevent="submit()">ADD CASHIER</button>
        <nuxt-link :to="'/cashiers'" class="btn btn-outline-danger">CANCEL</nuxt-link>
</form>
        



    </div>
</template>

<script>


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
        const config = { headers: {'Content-Type': 'application/json'} };
        const cashier = await this.$axios.post(`http://localhost:8000/api/cashier/add/`, data, config);
        this.$router.push("/cashiers");
      }
    },
}

</script>