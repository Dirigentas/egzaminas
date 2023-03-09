@extends('layouts.app')

@section('title', 'Pridėti naują patiekalą')

@section('content')

<div class="container col-md-7 mt-5">
    <div class="card">
        <div class='card-header'>
            <h5 class="card-title text-center">Naujas patiekalas</h5>
        </div>
        <form class="card-body" action='{{route('dish-store')}}' method='post' enctype="multipart/form-data">
            <label class="form-label">Valgiaraštis</label>
            <select class="form-select form-select-lg mb-4" name='menu'>
                @foreach($menu as $value)
                <option value="{{$value->name}}">{{$value->name}}</option>
                @endforeach
            </select>
            <label class="form-label">Pavadinimas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="name">
            <div class="form-floating mb-3">
                <textarea required name="description" class="form-control" placeholder="Aprašymas" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Aprašymas</label>
            </div>
            <label class="form-label">Nuotrauka</label>
            <input class="form-control form-control-lg mb-4" type="file" name="photo">

            <button type="submit" class="btn btn-outline-info">Sukurti</button>
            @csrf
        </form>
    </div>
</div>

@endsection
