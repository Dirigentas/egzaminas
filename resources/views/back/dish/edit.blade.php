@extends('layouts.app')

@section('title', 'Redaguoti patiekalą')

@section('content')

<div class="container col-md-7 mt-3">
    <div class="card">
        <div class='card-header'>
            <h5 class="card-title text-center">Patiekalo kortelės redagavimas</h5>
        </div>
        <form class="card-body" action='{{route('dish-update', $dish)}}' method='post' enctype="multipart/form-data">
            <div class='row'>
                <div class='col'>
                    <label for="exampleInputEmail1" class="form-label">Valgiaraštis</label>
                    <select class="form-select form-select-lg mb-4" aria-label="Default select example" name='firm'>
                        @foreach($menu as $value)
                        <option @if($dish->menu == $value->name) selected @endif value="{{$value->name}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='col'>
                    <label for="exampleInputEmail1" class="form-label">Pavadinimas</label>
                    <input required class="form-control form-control-lg mb-4" type="text" name="name" value='{{$dish->name}}'>
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea required name="description" class="form-control" placeholder="Aprašymas" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Aprašymas</label>
            </div>
            <button type="submit" class="btn btn-outline-info">Atnaujinti</button>
            @csrf
            @method('put')
        </form>
    </div>
</div>

@endsection
