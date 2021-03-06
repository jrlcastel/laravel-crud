import React from 'react'
import Router from 'next/router';
import '../pages/config';
import Cookie from 'js-cookie'
const axios = require('axios');

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


  async function del(id) {
    console.log('delete');
    await axios.delete(`/api/customer/delete/${id}`);
    Router.push('/customers');
  }

  async function edit(id) {
    Router.push(`/customers/edit/${id}`);
  }

  async function add(id) {
    Router.push(`/customers/add`);
  }

  function redirectToLogin() {
    // const router = useRouter();
    Router.push(`/login`);
  }

  export default function Home(props) {

    if (props.data==null) {
      return (
        <center>
          <br/> <br/>
          Please login to manage data.
          <br/>
          <br/>
          <button className="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" onClick={() => redirectToLogin()}>Go to login page.</button>
        </center>
      );
    
    }
    
    else return (
      <div>
        <br/>
          <center>
            CUSTOMERS
            <br/>
          <button className="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" onClick={() => add()}>Add</button>
          </center>
          
          <table className="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
              <thead>
                  <tr className="text-left border-b-2 border-gray-300">
                    <th className="px-4 py-3">ID</th>
                    <th className="px-4 py-3">Name</th>
                    <th className="px-4 py-3">Actions</th>
                  </tr>     
              </thead>

              <tbody>
                
                {
                props.data.map ( d => (
                  <tr key={d.id} className="bg-gray-100 border-b border-gray-200">
                    <td className="px-4 py-3">{d.id}</td>
                    <td className="px-4 py-3">{d.name}</td>
                    <td className="px-4 py-3">
                      <button className="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" onClick={() => del(d.id)}>Delete</button>
                      <button className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800" onClick={() => edit(d.id)}>Edit</button>
                    </td>
                  </tr>
                ))
              }

              </tbody>
            </table>
              
      </div>
    )
  }

  Home.getInitialProps = async function () {
    


    try {
      const res = await axios({
        method: 'get',
        headers: {
          'Authorization': `Bearer ${getCookie('userToken')}` 
        },
        url:`/api/customers`
    });
      return { data: res.data };
    } catch (e)  { 
    } return { data: null };

  }
