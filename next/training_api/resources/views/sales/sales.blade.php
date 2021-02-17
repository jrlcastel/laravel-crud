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
  <h1>SALES</h1>
  <br> <br>
  <a href="{{ route('sales.create')}}" class="btn btn-primary btn-sm"">Create</a>
  &nbsp &nbsp
  <a href=".." class="btn btn-primary btn-sm"">Back</a>
  <br> <br> <br>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>ITEM_ID</td>
          <td>RECIEPT_ID</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @if(count($sales)>0)
        @foreach($sales as $sale)
        <tr>
            <td>{{$sale->id}}</td>
            <td>{{$sale->item_id}}</td>
            <td>{{$sale->receipt_id}}</td>
            <td class="text-center">
                <a href="{{ route('sales.edit', $sale->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('sales.destroy', $sale->id)}}" method="post" style="display: inline-block">
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