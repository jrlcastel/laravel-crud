import axios from 'axios';
axios.defaults.baseURL = process.env.api_host;
axios.defaults.withCredentials = true;
// axios.defaults.headers = {
//     'Content-Type': 'application/json'
//     };
