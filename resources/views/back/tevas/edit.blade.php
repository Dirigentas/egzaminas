@extends('layouts.app')

@section('title', 'Redaguoti')

@section('content')

<div class="container col-md-7 mt-5">
    <div class="card">
        <div class='card-header'>
            <h5 class="card-title text-center">Kortelės redagavimas</h5>
        </div>
        <form class="card-body" action='{{route('tevas-update', $tevas)}}' method='post' enctype="multipart/form-data">
            <label for="exampleInputEmail1" class="form-label">Pavadinimas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="name" value='{{$tevas->name}}'>
            <label for="exampleInputEmail1" class="form-label">Miestas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="city" value='{{$tevas->city}}'>
            <label for="exampleInputEmail1" class="form-label">Adresas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="address" value='{{$tevas->address}}'>
            <label for="exampleInputEmail1" class="form-label">Darbo laiko pradžia</label>
            <input required class="form-control form-control-lg mb-4" type="time" name="start" value='{{$tevas->start}}'>
            <label for="exampleInputEmail1" class="form-label">Darbo laiko pabaiga</label>
            <input required class="form-control form-control-lg mb-4" type="time" name="end" value='{{$tevas->end}}'>
            <button type="submit" class="btn btn-outline-info">Išsaugoti</button>
            @method('put')
            @csrf
        </form>
    </div>
</div>

@endsection
