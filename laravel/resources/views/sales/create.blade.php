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
    Add Sale
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
      <form method="post" action="{{route('sales.store')}}">
          <div class="form-group">
              @csrf
              <label for="receipt_id">Receipt ID</label>
              <input type="text" class="form-control" name="receipt_id"/>
              <label for="item_id">Item ID</label>
              <input type="text" class="form-control" name="item_id"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Sale</button>
          <a href="/sales" class="btn btn-block btn-primary">Back</a>
      </form>
  </div>
</div>
@endsection