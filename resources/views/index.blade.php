@extends('app')
@section('content')
<h1>Выберите город:</h1>
<ul>
    @foreach ($cities as $city)
        <li><a href="{{ url($city->slug) }}">{{ $city->name }}</a></li>
    @endforeach
</ul>
@endsection
