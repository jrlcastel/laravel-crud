import Router from 'next/router';
import '../pages/config';
const axios = require('axios');

async function logOut(id) {
  try {
    await axios.post(`/logout`);
    console.log('Logout success'); 
    Router.push('/login');
  }
  catch (e) { console.log('Logout failed'); }
}

export default function Home() {
  return (
    <div>
      <br/> <br/> <br/> 
      <center>
          CRUD App Using Next JS & Laravel API
          <br/> <br/>
          With Token Authentication using Laravel Sanctum
      </center>

      <br/> <br/> <br/> 
      

    </div>
  )
}
