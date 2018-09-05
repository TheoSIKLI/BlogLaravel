@extends('layouts.master')
@section('styles')
<link rel="stylesheet" href="{!! asset('css/jquery.fancybox.min.css') !!}">
@endsection
@section('scripts')
<script src="{!! asset('js/jquery.fancybox.min.js') !!}"></script>
<script src="{!! asset('js/dashboard.js') !!}"></script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills mb-3 flex-column" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-posts" role="tab" aria-controls="pills-home" aria-selected="true">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-categories-tab" data-toggle="pill" href="#pills-categories" role="tab" aria-controls="pills-categories" aria-selected="false">Villes</a>
                    </li>
                </ul>
            </nav>
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div id="message" class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        </div>
                    </div>
                @endif
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3 tab-content">
                <div class="tab-pane fade show active" id="pills-posts">
                    <h1>Photos
                        <a href="{{route('post.form')}}">
                            <button type="button" class="btn btn-primary btn-sm">Ajouter une photo</button>
                        </a>
                    </h1>
                    <div class="col-md-12">

                            <?php
                            $
                                foreach($photos as $photo):

                                endforeach;
                            ?>

                    </div>
                </div>
                <div class="tab-pane fade show" id="pills-categories">
                    <h1>Villes
                        <a href="{{route('city.form')}}">
                            <button type="button" class="btn btn-primary btn-sm">Ajouter une ville</button>
                        </a>
                    </h1>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <th scope="col">Nom</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Date d'ajout</th>
                                <th scope="col" colspan="2">Actions</th>
                            </thead>
                            <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{$city->name}}</td>
                                    <td>
                                        <a href="{{$city->url_photo}}" id="single_image">
                                            <img src="{{$city->url_photo}}" width="100" height="100" alt="">
                                        </a>
                                    </td>
                                    <td>{{date('d-m-Y',strtotime($city->created_at))}}</td>
                                    <td><a href="{{action('CityController@edit', $city->id)}}" class="btn btn-warning">Modifier</a></td>
                                    <td>
                                        <form action="{{action('CityController@delete', $city->id)}}" method="delete">
                                            {{csrf_field()}}
                                            <input type="hidden" value="delete" name="_method" />
                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection