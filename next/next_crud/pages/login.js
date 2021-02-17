import Router from 'next/router';
import './config';


const axios = require('axios');


export default function Login(props) {


  const submitLogin = async event => {

      event.preventDefault();

      const loginData = {
        email: "user1@website.com",
        password: "user1"
      }

      try {
        await axios.get('/sanctum/csrf-cookie').then( async (res) => {
        try{
          await axios.post('/login', loginData).then(async res => {
            console.log(res);
            // const userData = await axios.get('/user');
            // console.log(userData);
            Router.push(`/`);
          });
      } catch (e) {
        console.log('fail');
        console.log(e);
      }
        // axios({
        //   method: 'post',
        //   url: `/api/login`,
        //   data: loginData,
        //   headers: { res }
        //   }).then( response => {
        //     if(response.data.error) console.log('error');
        //     else console.log('success');
        //   });
        });
      }
        catch (e) {
          console.log('fail2');
          console.log(e);
        }

  }

  return (

      <div>
          <br/> <br/>
          <form onSubmit={submitLogin}>
              <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Login</button>
          </form>
      </div>
  );
}