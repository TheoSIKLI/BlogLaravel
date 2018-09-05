@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h3>Se connecter</h3>
            <form action="{{route('login')}}" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Adresse email" value="{{old('email')}}">
            </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" value="Se connecter" class="btn btn-primary btn-lg btn-block">
            </form>
        </div>
    </div>
@endsection
