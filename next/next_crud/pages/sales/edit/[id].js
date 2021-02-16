
import Router from 'next/router';


async function upd(data, id) {

    console.log(`http://localhost:8000/api/sale/update/${id}`);

    const axios = require('axios');

    await axios({
      method: 'put',
      url: `http://localhost:8000/api/sale/update/${id}`,
      data: data,
    });

    Router.push('/sales');
  }



export default function Id(props) {

// const router = useRouter();
// const sale = getData(router.query.id);
// const name = sale.data.name;

const update = async event => {

    event.preventDefault();
    console.log(event.target.receipt_id.value);
    console.log(event.target.item_id.value);

    const data = {
        receipt_id: event.target.receipt_id.value,
        item_id: event.target.item_id.value,
    };

    upd(data, props.data.id);
}

return (
    <div>
        <br/> <br/>

        <form onSubmit={update}>
            <label htmlFor="name">Receipt ID: &nbsp; &nbsp; &nbsp; </label>
            <input id="name" name="receipt_id" type="text" autoComplete="name" defaultValue={props.data.receipt_id} className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
            <br/>
            <label htmlFor="name">Item ID: &nbsp; &nbsp; &nbsp; </label>
            <input id="name" name="item_id" type="text" autoComplete="name" defaultValue={props.data.item_id} className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
            <br/>
            <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Update</button>
        </form>

    </div>
);
}





Id.getInitialProps = async ({ query }) => {

    const axios = require('axios');

const { id } = query;

const res =  await axios.get(`http://localhost:8000/api/sale/${id}`);
return { data: res.data };

}