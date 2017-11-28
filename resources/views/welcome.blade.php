@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">



                    @if($posts)
                        @foreach($posts as $post)
                    <div class="panel panel-default text-center">
                        <div class="panel-body">
                            <!-- Blog Post -->

                            <!-- Title -->
                            <a href="{{route('home.post', $post->slug)}}"><h1>{{$post->title}}</h1></a>

                            <!-- Author -->
                            <p class="lead">
                                by <a href="#">{{$post->user->name}}</a>
                            </p>

                            <hr>

                            <!-- Date/Time -->
                            <p><span class="glyphicon glyphicon-time"></span>Posted  {{$post->created_at->diffForHumans()}}</p>

                            <hr>

                            <!-- Preview Image -->
                            <a href="{{route('home.post', $post->slug)}}"><img height="200" class="img-responsive center-block blog-post" src="{{$post->photo->file}}" alt="img"></a>

                            <hr>

                            <!-- Post Content -->
                            <p>{{str_limit($post->body, 500)}}</p>

                        </div>
                    </div>
                        @endforeach
                    @endif

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">
                                {{$posts->render()}}
                            </div>
                        </div>
        </div>
    </div>
</div>
@endsection
