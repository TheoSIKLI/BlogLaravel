@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{!! asset('css/index.css') !!}">
@endsection
@section('scripts')
    <script src="{!! asset('js/index.js') !!}"></script>
@endsection
@section('title')
    Charlotte Fleury Blog
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/index/index.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('js/index/index.js')}}"></script>
@endsection

@section('content')
    <main role="main" class="container"  style="margin-top: 5px">
        <div class="row">
            <?php
            foreach ($cities as $city) :
            ?>
                <div class="col-md-4 col-sm-12 content">
                    <div class="card mb-4 mt-4 shadow-sm">
                        <a href="{{route('pictures.index',['name' => $city->name])}}" id="open-img" class="text-black-50" data-id="{{$city->id}}">
                            <div class="card-body">
                                <img class="card-img-top" data-src="{{$city->url_photo}}" style=" width: 100%; display: block;" src="{{$city->url_photo}}" data-holder-rendered="true">
                                <div class="middle">
                                    <p class="text">{{$city->name}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach;?>
        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection