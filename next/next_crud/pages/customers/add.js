import Router from 'next/router';

async function add(data) {

    console.log(`http://localhost:8000/api/customer/add`);

    const axios = require('axios');

    await axios({
      method: 'post',
      url: `http://localhost:8000/api/customer/add`,
      data: data,
    });

    Router.push('/customers');
  }



export default function Id(props) {

// const router = useRouter();
// const customer = getData(router.query.id);
// const name = customer.data.name;

const addForm = async event => {

    event.preventDefault();
    console.log(event.target.name.value);

    const data = {
        name: event.target.name.value,
    };

    add(data);
}

return (
    <div>
        <br/> <br/>

        <form onSubmit={addForm}>
            <label htmlFor="name">Name: &nbsp; &nbsp; &nbsp; </label>
            <input id="name" name="name" type="text" autoComplete="name" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
            <br/>
            <button type="submit" className="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">ADD</button>
        </form>

    </div>
);
}

