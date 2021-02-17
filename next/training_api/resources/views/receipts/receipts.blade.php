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
  <h1>RECEIPTS</h1>
  <br> <br>
  <a href="{{ route('receipts.create')}}" class="btn btn-primary btn-sm"">Create</a>
  &nbsp &nbsp
  <a href=".." class="btn btn-primary btn-sm"">Back</a>
  <br> <br> <br>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>CUSTOMER_ID</td>
          <td>CASHIER_ID</td>
          <td>TOTAL</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @if(count($receipts)>0)
        @foreach($receipts as $receipt)
        <tr>
            <td>{{$receipt->id}}</td>
            <td>{{$receipt->customer_id}}</td>
            <td>{{$receipt->cashier_id}}</td>
            <td>{{$receipt->total}}</td>
            <td class="text-center">
                <a href="{{ route('receipts.edit', $receipt->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('receipts.destroy', $receipt->id)}}" method="post" style="display: inline-block">
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