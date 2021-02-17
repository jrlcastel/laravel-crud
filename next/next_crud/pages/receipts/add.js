import Router from 'next/router';
import '../config';
const axios = require('axios');

    async function add(data) {
        await axios({
        method: 'post',
        url: `/api/receipt/add`,
        data: data,
        });
        Router.push('/receipts');
    }



    export default function Id(props) {

        const addForm = async event => {
            event.preventDefault();
            console.log(event.target.name.value);
            const data = {
                customer_id: event.target.customer_id.value,
                cashier_id: event.target.cashier_id.value,
                total: event.target.total.value,
            };
            add(data);
        }

    return (
        <div>
            <br/> <br/>
            <form onSubmit={addForm}>
                <label htmlFor="name">Customer ID: &nbsp; &nbsp; &nbsp; </label>
                <input id="name" name="customer_id" type="text" autoComplete="name" className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                <br/>
                <label htmlFor="name">Cashier ID: &nbsp; &nbsp; &nbsp; </label>
                <input id="name" name="cashier_id" type="text" autoComplete="name"  className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                <br/>
                <label htmlFor="name">Total: &nbsp; &nbsp; &nbsp; </label>
                <input id="name" name="total" type="text" autoComplete="name"  className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                <br/>
                <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">ADD</button>
            </form>

        </div>
    );
    }

