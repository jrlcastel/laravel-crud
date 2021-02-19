@extends('layout')

@section('content')

<?php use App\Http\Controllers\CashierController; ?>


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
    Add User
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
      <form method="post" action="{{route('cashiers.store')}}">
          <div class="form-group">
              @csrf
              <label for="name">cashier name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create User</button>
          <a href="/cashiers" class="btn btn-block btn-primary">Back</a>
      </form>
  </div>
</div>
@endsection