@extends('layouts.app')

@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<h4> Categories </h4>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $cat_data)
        <form method="POST" action="{{ url('delete/'.$cat_data->id) }}">
        @method("DELETE")
        @csrf
        
        <tr>
            <td>{{ $cat_data->id }}</td>
            <td>{{ $cat_data->name }}</td>
            <td>{{ $cat_data->description }}</td>
            <td>{{ $cat_data->created_at}}</td>
            <td>{{ $cat_data->updated_at}}</td>
            <td><a type="button" href="/category/{{ $cat_data->id }}" class="btn btn-sm btn-primary btn-warning ">See more</a>
            <a href="/category/edit/{{ $cat_data->id }}" class="btn btn-sm btn-primary btn-success" type="button">Edit Record</a>
            <button class="btn btn-sm btn-primary btn-danger" type="submit">Delete Record</a></td>

        </tr>
        @endforeach
    </tbody>

</table>

{!! $categories->links() !!}

@endsection