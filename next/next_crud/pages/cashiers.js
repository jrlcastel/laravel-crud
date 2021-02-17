import Router from 'next/router';
import '../pages/config';
const axios = require('axios');

  async function del(id) {
    await axios.delete(`${process.env.api_host}/api/cashier/delete/${id}`);
    Router.push('/cashiers');
  }

  async function edit(id) {
    Router.push(`/cashiers/edit/${id}`);
  }

  async function add(id) {
    Router.push(`/cashiers/add`);
  }

  export default function Home(props) {
    return (
      <div>
        <br/>
          <center>
            CASHIERS
            <br/>
          <button className="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" onClick={() => add()}>Add</button>
          </center>

          <table className="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
              <thead>
                  <tr className="text-left border-b-2 border-gray-300">
                    <th className="px-4 py-3">ID</th>
                    <th className="px-4 py-3">Name</th>
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
    const res = await axios.get(`/api/cashiers`);
    return { data: res.data };
  }
