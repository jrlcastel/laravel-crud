
import Router from 'next/router';


    // async function getData(id) {
    //     const axios = require('axios');
    //     return await axios.get(`http://localhost:8000/api/customer/${router.query.id}`);
    // }


    async function upd(data, id) {

        console.log(`http://localhost:8000/api/customer/update/${id}`);

        const axios = require('axios');

        await axios({
          method: 'put',
          url: `http://localhost:8000/api/customer/update/${id}`,
          data: data,
        });

        Router.push('/customers');
      }



export default function Id(props) {

    // const router = useRouter();
    // const customer = getData(router.query.id);
    // const name = customer.data.name;
    
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
                <input id="name" name="name" type="text" autoComplete="name" defaultValue={props.data.name} class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
                <br/>
                <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Submit</button>
            </form>

        </div>
    );
}





Id.getInitialProps = async ({ query }) => {
    
        const axios = require('axios');

    const { id } = query;
    
    const res =  await axios.get(`http://localhost:8000/api/customer/${id}`);
    return { data: res.data };
  
  }