@extends('layouts.app')

@section('title', 'Redaguoti valgiaraštį')

@section('content')

<div class="container col-md-7 mt-3">
    <div class="card">
        <div class='card-header'>
            <h5 class="card-title text-center">Valgiaraščio kortelės redagavimas</h5>
        </div>
        <form class="card-body" action='{{route('menu-update', $menu)}}' method='post' enctype="multipart/form-data">
            <div class='row'>
                <div class='col'>
                    <label for="exampleInputEmail1" class="form-label">Restoranas</label>
                    <select class="form-select form-select-lg mb-4" aria-label="Default select example" name='firm'>
                        @foreach($firm as $value)
                        <option @if($menu->firm == $value->name) selected @endif value="{{$value->name}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='col'>
                    <label for="exampleInputEmail1" class="form-label">Pavadinimas</label>
                    <input required class="form-control form-control-lg mb-4" type="text" name="name" value='{{$menu->name}}'>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-info">Atnaujinti</button>
            @csrf
            @method('put')
        </form>
    </div>
</div>

@endsection
