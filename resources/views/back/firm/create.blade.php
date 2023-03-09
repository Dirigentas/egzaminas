@extends('layouts.app')

@section('title', 'Pridėti naują įstaigą')

@section('content')

<div class="container col-md-7 mt-5">
    <div class="card">
        <div class='card-header'>
            <h5 class="card-title text-center">Nauja įstaigos kortelė</h5>
        </div>
        <form class="card-body" action='{{route('firm-store')}}' method='post' enctype="multipart/form-data">
            <label for="exampleInputEmail1" class="form-label">Pavadinimas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="name" value="{{old('name')}}">
            <label for="exampleInputEmail1" class="form-label">Kodas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="code" value="{{old('city')}}">
            <label for="exampleInputEmail1" class="form-label">Adresas</label>
            <input required class="form-control form-control-lg mb-4" type="text" name="address" value="{{old('address')}}">
            <button type="submit" class="btn btn-outline-info">Sukurti</button>
            @csrf
        </form>
    </div>
</div>

@endsection
