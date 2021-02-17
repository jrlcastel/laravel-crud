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
          CRUD App Using Next JS
      </center>

      <br/> <br/> <br/> 
      
      <center>
      <button className="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" onClick={() => logOut()}>Log Out</button>
      </center>

    </div>
  )
}
