
import Router from 'next/router';
import React from 'react'
import './config';
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


export default function Login(props) {

  var loginError = false;

  var cookie = require('cookie-cutter');  


  const submitLogin = async event => {

      event.preventDefault();

      const loginData = {
        email: "user1@website.com",
        password: "user1"
      }

      try {
        const res = await axios({
          method: 'post',
          url: 'api/sanctum/token',
          data: loginData,
        });
        
        const loginError = false;
        document.cookie=`id=${res.data.user.id}`;
        document.cookie=`userToken=${res.data.token}`;

        console.log('Login Success.');
      } catch (e) {
        loginError = true;
        console.log('Login Failed.');
        console.log(e);
      }
    }


  
  const submitWrongLogin = async event => {

    event.preventDefault();

    const wrongLoginData = {
      email: "ussser1@website.com",
      password: "qer"
    }

    try {
      const token = await axios({
        method: 'post',
        url: 'api/sanctum/token',
        data: wrongLoginData,
      });
      
      console.log(token);

      document.cookie=`userToken=${token.data}`;
    } catch (e) {
      document.cookie=`invalidLogin=1`;
      console.log('Login failed...');
      console.log(e);
    }
  }
  
  
const submitLogout = async event => {

  event.preventDefault();


    try {
      const token = await axios({
        method: 'post',
        url: 'api/logout',
        headers: {
          'Authorization': `Bearer ${getCookie('userToken')}` 
        },
      });
      document.cookie=`isLoggedIn=0`;
      console.log('logged out');
    } catch (e) {
      console.log('Logout failed failed...');
      console.log(e);
    }
}

  return (

      <center>
        <div>

          <div>
          <br/> <br/>
              <form onSubmit={submitLogin}>
                  <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Login</button>
              </form>
              <form onSubmit={submitWrongLogin}>
                  <button type="submit" className="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Wrong Login</button>
              </form>
          </div> 

              
          <br/> <br/>


          <form onSubmit={submitLogout}>
            <button type="submit" className="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Logout</button>
          </form>


      </div>

      </center>
  );

}