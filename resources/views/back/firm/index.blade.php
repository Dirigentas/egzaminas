@extends('layouts.app')

@section('title', 'Įstaigų sąrašas')

@section('content')

<div class='container'>
    <div class="card">
        <h3 class="fw-bold card-header text-center">
            Įstaigų sąrašas
        </h3>
        <ul class="list-group">
            @foreach($firm as $value)
            <li class="list-group-item d-flex">
                <div class='fw-bold col'> {{$value->name}}</div>
                <div class='col'> {{$value->code}}</div>
                <div class='col'> {{$value->address}}</div>
                <div class='col'>
                    <a href='{{route('firm-edit', $value)}}' class="btn btn-outline-primary">Redaguoti</a>
                </div>
                <form action='{{route('firm-destroy', $value)}}' method='post' class='col'>
                    <button type="submit" class="btn btn-outline-danger">Ištrinti</button>
                    @method('delete')
                    @csrf
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
