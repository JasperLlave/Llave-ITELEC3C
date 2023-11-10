@extends('layouts.app')

@section('content')

<form method="POST" action="{{ url('update-record/'.$item->id) }}">
    <h1> Edit Category </h1>
    @csrf
    @method('PUT')
    <div class="row my-3">
        <div class="form col-md-5">
            <label> Name: </label>
            <input type="text" name="name" id="#" class="form-control" value="{{ $item->name }}" required>
        </div>
        <div class="form col-md-5">
            <label> Description: </label>
            <input type="text" name="description" id="#" class="form-control" value="{{ $item->description }}" required>
        </div>
    </div>
    <button class="btn btn-sm btn-success" type="submit"> Update Record </button>
</form>

@endsection