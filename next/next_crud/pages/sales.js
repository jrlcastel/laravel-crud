import Head from 'next/head'
import Router from 'next/router';

async function del(id) {
  const axios = require('axios');
  await axios.delete(`${process.env.api_host}/api/sale/delete/${id}`);
  Router.push('/sales');
}

async function edit(id) {
  Router.push(`/sales/edit/${id}`);
}

async function add(id) {
  Router.push(`/sales/add`);
}

export default function Home(props) {
  return (
    <div>
      <br/>
        <center>
          SALES
          <br/>
        <button className="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" onClick={() => add()}>Add</button>
        </center>
        

        


        <table className="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <thead>
                <tr className="text-left border-b-2 border-gray-300">
                  <th className="px-4 py-3">ID</th>
                  <th className="px-4 py-3">Receipt ID</th>
                  <th className="px-4 py-3">Item ID</th>
                  <th className="px-4 py-3">Actions</th>
                </tr>     
            </thead>

            <tbody>
            {
            props.data.map ( d => (
              <tr key={d.id} className="bg-gray-100 border-b border-gray-200">
              <td className="px-4 py-3">{d.id}</td>
                <td className="px-4 py-3">{d.receipt_id}</td>
                <td className="px-4 py-3">{d.item_id}</td>
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
  const axios = require('axios');
  const res = await axios.get(`${process.env.api_host}/api/sales`);
  return { data: res.data };
}
