@extends('layouts.app')

@section('title', 'Pridėti naują valgiaraštį')

@section('content')

<div class="container col-md-7 mt-5">
    <div class="card">
        <div class='card-header'>
            <h5 class="card-title text-center">Naujas valgiaraštis</h5>
        </div>
        <form class="card-body" action='{{route('menu-store')}}' method='post' enctype="multipart/form-data">
            <label class="form-label">Įstaiga</label>
            <select class="form-select form-select-lg mb-4" name='firm'>
                @foreach($firm as $value)
                <option value="{{$value->name}}">{{$value->name}}</option>
                @endforeach
            </select>
            <label class="form-label">Pavadinimas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="name">
            <button type="submit" class="btn btn-outline-info">Sukurti</button>
            @csrf
        </form>
    </div>
</div>

@endsection
