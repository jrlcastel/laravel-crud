<template>
  <div>
     <Header/>
    <nuxt/>
  </div>
</template>

<script>

  import Header from '~/components/Header.vue'
  export default {
    components: {
      Header
    }
  }


</script>


<style>

  .container{
    width: 900px;
    margin: 40px auto;
  }

  .title{
    font-size: 35px;
  }

  .subtitle{
    display:block;
    font-size: 18px;
  }

  .header{
    margin: 40px auto;
    text-align: right;
    width: 900px;
  }

  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  }

  li {
    margin-left: 20px;
    display: inline;  
  }

  .entry_thumb{
    margin-top: 20px;
    padding: 15px;
    border: 1px solid black;
    border-radius: 15px;
  }




html {
  font-family:
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}
</style>
