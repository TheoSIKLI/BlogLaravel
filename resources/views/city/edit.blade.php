@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h2>Modifier une ville</h2>
    <div class="col-md-6 offset-md-3">
        <form method="post" action="{{route('city.edit', $id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Nom de la ville</label>
                <input type="text" name="name" value="{{$city->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="Image">Image</label>
                <input type="file" name="photo" id="image" class="form-control-file">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Modifier">
        </form>
    </div>
</div>
@endsection