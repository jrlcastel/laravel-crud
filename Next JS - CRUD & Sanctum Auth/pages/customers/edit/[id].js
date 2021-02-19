import Router from 'next/router';
import '../../config';
const axios = require('axios');

    async function upd(data, id) {

        await axios({
          method: 'put',
          url: `/api/customer/update/${id}`,
          data: data,
        });

        Router.push('/customers');
      }



    export default function Id(props) {

        const update = async event => {
            event.preventDefault();
            console.log(event.target.name.value);
            const data = {
                name: event.target.name.value,
            };
            upd(data, props.data.id);
        }

        return (
            <div>
                <br/> <br/>
                <form onSubmit={update}>
                    <label htmlFor="name">Name: &nbsp; &nbsp; &nbsp; </label>
                    <input id="name" name="name" type="text" autoComplete="name" defaultValue={props.data.name} className="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                    <br/>
                    <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Submit</button>
                </form>
            </div>
        );
    }



    Id.getInitialProps = async ({ query }) => {
        const { id } = query;
        const res =  await axios.get(`/api/customer/${id}`);
        return { data: res.data };
    }