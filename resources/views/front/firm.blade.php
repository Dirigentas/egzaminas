@extends('layouts.front')

@section('title', 'Valgiaraščiai')

@section('content')

<div class='container text-center row'>
    <div class=''>
        @foreach($menu as $value)
        <div class="card mt-4">
            <li class="list-group-item d-flex">
                <div class='fw-bold col'>Maitinimo įstaiga -{{$value->firm}}</div>
            </li>
            <li class="list-group-item d-flex">
                <div class='col'>Valgiaraščio pavadinimas - {{$value->name}}</div>
            </li>
            <a href='{{route('showDish', $value)}}' class='ms-3 col-1 btn btn-outline-warning'>Pasirinkti</a>
            @endforeach
        </div>
    </div>
</div>

@endsection
