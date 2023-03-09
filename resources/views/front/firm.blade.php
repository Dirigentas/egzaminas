@extends('layouts.front')

@section('title', 'Valgiaraščiai')

@section('content')

<div class='container text-center row'>
    <div class='col-9'>
        <div class="card">
            <div class="card-head">Maitinimo įstaiga: {{$firm->name}}</div>

            @foreach($menu as $value)
            <li class="list-group-item d-flex">
                <div class='fw-bold col'> {{$value->firm}}</div>
                <div class='col'> {{$value->name}}</div>
            </li>
            @endforeach

            <div class="card-head">{{$menu[0]->name}}</div>
            <div class="">
                @if($dish->photo)
                <img style="width: 100px" class='card-img-top' src='{{asset($dish->photo)}}'>
                @else
                <img style="width: 100px" class='card-img-top' src='{{asset('no.jpg')}}'>
                @endif
                <div class="card-body row">
                    <h4 class='card-title col-6'> {{$menu}}</h4>
                    <div class='col-6'> {{$dish->name}} </div>
                    <h4 class='col-6'> {{$dish->name}}</h4>
                    <form class='mt-3' action="{{route('add-to-cart')}}" method="post">
                        <label>Patiekalų skaičius: </label>
                        <input type="number" min="1" name="count" value="1">
                        <input type="hidden" name="dish" value="{{$dish->id}}">
                        <button type="submit" class="col-12 mt-3 btn btn-outline-primary">Dėti į užsakymą</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
