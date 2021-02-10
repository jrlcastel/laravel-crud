<template>
    <div class="container">

        <h2></h2>

        <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @if(count($items)>0)
        @foreach($items as $item)
        <tr>
            <td></td>
            <td></td>
            <td class="text-center">
                <a href="" class="btn btn-primary btn-sm">Edit</a>
                <form action="" method="post" style="display: inline-block">
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>


    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [
                {
                    id: '1',
                    name: 'one'
                },
                {
                    id: '2',
                    name: 'two'
                },
            ]
        }
    }
}
</script>