@extends('layouts.master')
@section('content')
    <main role="main" class="container"  style="margin-top: 5px">
        <div class="row">
            <?php
            if(sizeof($pictures) > 0) {
                foreach ($pictures as $picture) :
            ?>
                <div class="col-md-4 col-sm-12 content">
                    <div class="card mb-4 mt-4 shadow-sm">
                        <a href="{{route('pictures.index',['name' => $picture->name])}}" id="open-img" class="text-black-50" data-id="{{$picture->id}}">
                            <div class="card-body">
                                <img class="card-img-top" data-src="{{$picture->url_image}}" style=" width: 100%; display: block;" src="{{$picture->url_image}}" data-holder-rendered="true">
                                <div class="middle">
                                    <p class="text">{{$picture->name}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
                endforeach;
            } else {
                echo "<h3>Il n'y a actuellement aucune photo dans cette ville";
                }
            ?>
        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection