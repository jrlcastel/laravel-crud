@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>ITEMS</h1>
  <br> <br>
  <a href="{{ route('items.create')}}" class="btn btn-primary btn-sm"">Create</a>
  &nbsp &nbsp
  <a href=".." class="btn btn-primary btn-sm"">Back</a>
  <br> <br> <br>
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
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td class="text-center">
                <a href="{{ route('items.edit', $item->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('items.destroy', $item->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>
<div>
@endsection