@extends('layouts.front')

@section('title', 'Patiekalai')

@section('content')

<div class='container text-center row'>
    <div class=''> Patiekalai
        @foreach($dish as $value)
        <div class="card mt-4">
            <li class="list-group-item d-flex">
                <div class='fw-bold col'>Valgiaraštis {{$value->menu}}</div>
            </li>
            <li class="list-group-item d-flex">
                <div class='col'> - {{$value->name}}</div>
            </li>
            <form class='mt-3' action="{{route('add-to-cart')}}" method="post">
                <label>Kiekis: </label>
                <input type="number" min="1" name="count" value="1">
                <input type="hidden" name="hotel" value="{{$value->id}}">
                <button type="submit" class="col-12 mt-3 btn btn-outline-primary">Pridėti į užsakymą</button>
                @csrf
            </form>
            @endforeach
        </div>
    </div>
</div>

@endsection
