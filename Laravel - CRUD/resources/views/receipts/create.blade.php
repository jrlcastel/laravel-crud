@extends('layout')

@section('content')

<?php use App\Http\Controllers\ItemController; ?>


<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Add Receipt
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{route('receipts.store')}}">
          <div class="form-group">
              @csrf
              <label for="customer_id">customer_id</label>
              <input type="text" class="form-control" name="customer_id"/>
              <label for="cashier_id">cashier_id</label>
              <input type="text" class="form-control" name="cashier_id"/>
              <label for="total">total</label>
              <input type="text" class="form-control" name="total"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create User</button>
          <a href="/receipts" class="btn btn-block btn-primary">Back</a>
      </form>
  </div>
</div>
@endsection