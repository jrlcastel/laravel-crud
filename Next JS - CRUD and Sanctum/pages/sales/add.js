import Router from 'next/router';
import '../config';
const axios = require('axios');


    async function add(data) {
        await axios({
            method: 'post',
            url: `/api/sale/add`,
            data: data,
        });
        Router.push('/sales');
    }


    export default function Id(props) {

        const addForm = async event => {
            event.preventDefault();
            const data = {
                receipt_id: event.target.receipt_id.value,
                item_id: event.target.item_id.value,
            };
            add(data);
        }

        return (
            <div>
                <br/> <br/>
                <form onSubmit={addForm}>
                    <label htmlFor="name">Receipt ID: &nbsp; &nbsp; &nbsp; </label>
                <   input id="name" name="receipt_id" type="text" autoComplete="name" className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                    <br/>
                    <label htmlFor="name">Item ID: &nbsp; &nbsp; &nbsp; </label>
                    <input id="name" name="item_id" type="text" autoComplete="name" className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                    <br/>
                    <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">ADD</button>
                </form>
            </div>
        );
    }

