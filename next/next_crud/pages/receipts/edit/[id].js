import Router from 'next/router';
import '../../config';
const axios = require('axios');

    async function upd(data, id) {
        await axios({
            method: 'put',
            url: `/api/receipt/update/${id}`,
            data: data,
        });
        Router.push('/receipts');
    }



    export default function Id(props) {

        const update = async event => {
            event.preventDefault();
            const data = {
                customer_id: event.target.customer_id.value,
                cashier_id: event.target.cashier_id.value,
                total: event.target.total.value,
            };
            upd(data, props.data.id);
        }

        return (
            <div>
                <br/> <br/>
                <form onSubmit={update}>
                <label htmlFor="name">Customer ID: &nbsp; &nbsp; &nbsp; </label>
                    <input id="name" name="customer_id" type="text" autoComplete="name" defaultValue={props.data.customer_id} className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                    <br/>
                    <label htmlFor="name">Cashier ID: &nbsp; &nbsp; &nbsp; </label>
                    <input id="name" name="cashier_id" type="text" autoComplete="name" defaultValue={props.data.cashier_id} className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                    <br/>
                    <label htmlFor="name">Total: &nbsp; &nbsp; &nbsp; </label>
                    <input id="name" name="total" type="text" autoComplete="name" defaultValue={props.data.total} className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                    <br/>
                    <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Update</button>
                </form>
            </div>
        );  
    }





    Id.getInitialProps = async ({ query }) => {
        const { id } = query;
        const res =  await axios.get(`/api/receipt/${id}`);
        return { data: res.data };
    }