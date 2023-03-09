@extends('layouts.front')

@section('title', 'Pagrindinis')

@section('content')

<div class='container text-center'>
    <div class="card">
        <div class='card-header'>
            <h3 class='mb-3'>Bla bla bla</h3>
            <form class='row mb-3' action="{{route('index')}}" method='get'>
                <div class="col-3">
                    <select class="form-select" name="id">
                        <option value="all">Sąrašas</option>
                        @foreach($tevas as $t)
                        <option value="{{$t->id}}" @if($t->id == $tevasShow) selected @endif>{{$t->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='col-4'>
                    <select class="form-select" name='sort'>
                        <option value='all' selected>Rūšiuoti</option>
                        @foreach($sortSelect as $index => $value)
                        <option value="{{$index}}" @if($sortShow==$index) selected @endif>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="ms-3 col-1 btn btn-outline-primary">Rodyti</button>
                <a href='{{route('index')}}' class='ms-3 col-1 btn btn-outline-warning'>Išvalyti</a>
                @csrf
            </form>
            <form class='row' action="{{route('index')}}" method='get'>
                <div class='col-4'>
                    <input name='s' type="text" class="form-control" placeholder="Ieškoti pagal patiekalo pavadinimą" value="{{$s}}">
                </div>
                <button type="submit" class="ms-3 col-1 btn btn-outline-primary">Ieškoti</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach($vaikas as $v)
        <div class="col-6 mt-5">
            @if($v->photo)
            <img class='img-fluid img-thumbnail' src='{{asset($v->photo)}}'>
            @else
            <img class='img-fluid img-thumbnail' src='{{asset('http://localhost/bandomasis/public/no.jpg')}}'>

            @endif
            <div> {{$v->restaurant}}</div>
            <div class='fw-bold col'> {{$v->name}}</div>
            <div> {{round($v->price, 0)}} Eur</div>
            <div>
                Įvertinimas: {{$v->rating}}
            </div>
            @if(isset($user))
            <form class='mt-3' action="{{route('update_rating', $v)}}" method="post" enctype="multipart/form-data">
                <label>Tavo įvertinimas: </label>
                <input required type="number" min="1" max='5' name="rating">
                <button type="submit" class="col-12 mt-3 btn btn-outline-primary">Įvertinti</button>
                @csrf
                @method('put')
            </form>
            @else
            <a href='{{route('home')}}' class="col-12 mt-3 btn btn-outline-primary">Rezervuoti (reikalingas prisijungimas)</a>
            @endif

        </div>
        @endforeach
    </div>

</div>

@endsection
