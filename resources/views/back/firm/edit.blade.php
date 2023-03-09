@extends('layouts.app')

@section('title', 'Redaguoti įstaigą')

@section('content')

<div class="container col-md-7 mt-5">
    <div class="card">
        <div class='card-header'>
            <h5 class="card-title text-center">Įstaigos kortelės redagavimas</h5>
        </div>
        <form class="card-body" action='{{route('firm-update', $firm)}}' method='post' enctype="multipart/form-data">
            <label for="exampleInputEmail1" class="form-label">Pavadinimas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="name" value='{{$firm->name}}'>
            <label for="exampleInputEmail1" class="form-label">Kodas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="code" value='{{$firm->code}}'>
            <label for="exampleInputEmail1" class="form-label">Adresas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="address" value='{{$firm->address}}'>
            <button type="submit" class="btn btn-outline-info">Išsaugoti</button>
            @method('put')
            @csrf
        </form>
    </div>
</div>

@endsection
