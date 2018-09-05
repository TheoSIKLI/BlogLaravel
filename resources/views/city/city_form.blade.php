@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-sm-12 ml-sm-auto col-md-12 pt-3">
                <h1 class="text-center">Ajouter une ville</h1>
                <div class="col-md-6 offset-md-3">
                    <form method="post" action="{{route('city.submit')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="id_title" name="title"
                                   aria-describedby="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter une ville</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection