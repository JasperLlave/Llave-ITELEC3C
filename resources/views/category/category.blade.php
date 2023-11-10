@extends('layouts.app')

@section('content')
<h4> {{ $item->name }} details: </h4>

<p> Name: {{ $item->name }} </p>
<p> Description: {{ $item->description }} </p>
<p> Created At: {{ $item->created_at }} </p>
<p> Updated At: {{ $item->updated_at }} </p>

@endsection