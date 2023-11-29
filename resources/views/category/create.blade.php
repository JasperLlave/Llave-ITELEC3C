@extends('layouts.app')

@section('content')

@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('/save-record') }}" method="POST" enctype="multipart/form-data">

    <h4> Create new category </h4>

    {{ @csrf_field() }}
    <div class="row my-3">
        <div class="form col-md-4">
            <label> Name: </label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form col-md-4">
            <label> Description: </label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <div class="form col-md-4">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
    </div>
    <button class="btn btn-sm btn-success" type="submit"> Save Record </button>
</form>



@endsection