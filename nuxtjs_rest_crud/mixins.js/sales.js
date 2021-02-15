// export default{
//     methods: {
//         data() {
//           return {
//             item_id: '',
//             receipt_id:  ''
//           }
//         },
//         async submit(){
//             const data = {
//                 item_id: this.item_id,
//                 receipt_id:  this.receipt_id,
//             };
//             const config = { headers: {'Content-Type': 'application/json'} };
//             const sale = await this.$axios.post(`http://localhost:8000/api/sale/add/`, data, config);
//             this.$router.push("/sales");
//         }
//     }
// }