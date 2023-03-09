@extends('layouts.front')

@section('title', 'Išsirink patiekalą')

@section('content')

<div class='container text-center'>
    <div class="card">
        <div class='card-header'>
            <h3 class='mb-3'>Išsirink patiekalą</h3>
            <form class='row mb-3' action="{{route('index')}}" method='get'>
                <div class="col-3">
                    <select class="form-select" name="id">
                        <option value="all">Sąrašas</option>
                        @foreach($firm as $f)
                        <option value="{{$f->id}}" @if($f->id == $firmShow) selected @endif>{{$f->name}}</option>
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
                    <input name='s' type="text" class="form-control" placeholder="Ieškoti pagal įstaigos pavadinimą" value="{{$s}}">
                </div>
                <button type="submit" class="ms-3 col-1 btn btn-outline-primary">Ieškoti</button>
                @csrf
            </form>
        </div>
    </div>
    <div class='container mt-3'>
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
                        <a href='{{route('show', $value)}}' class="btn btn-outline-primary">Pasirinkti</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>


</div>

@endsection
