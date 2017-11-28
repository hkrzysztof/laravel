@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">



                @if($post)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
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
                                <p>{{$post->body}}</p>

                                <hr>
                                </div>
                                @if(Session::has('comment_posted'))
                                    <p class="bg-success">{{session('comment_posted')}}</p>
                                @endif
                            <!-- Blog Comments -->
                                @if(Auth::check())
                                <!-- Comments Form -->
                                    <div class="well">
                                        <h4>Leave a Comment:</h4>

                                        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                                        <input type="hidden" name="post_id" value="{{$post->id}}">

                                        <div class="form-group">
                                            {!! Form::label('body', 'Comment:') !!}
                                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>'3']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                        </div>

                                        {!! Form::close() !!}

                                    </div>

                                @endif

                                <hr>

                                <!-- Posted Comments -->

                                <!-- Comment -->
                                @if(count($comments) > 0)
                                    @foreach($comments as $comment)
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img height="50" class="media-object"src="{{$comment->photo ? $comment->photo : 'http://via.placeholder.com/50x50'}}" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$comment->author}}
                                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                                </h4>
                                                <p>{{$comment->body}}</p>

                                                <div class="comment-reply-container">
                                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                                    <div class="comment-reply">
                                                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                        <div class="form-group">
                                                            {!! Form::label('body', 'Reply:') !!}
                                                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>





                                            @if(count($comment->replies) > 0 )
                                                @foreach($comment->replies as $reply)
                                                    @if($reply->is_active == 1)

                                                        <!-- Nested Comment -->
                                                            <div id="nested-comment" class="media">
                                                                <a class="pull-left" href="#">
                                                                    <img height="50" class="media-object"src="{{$reply->photo ? $reply->photo : 'http://via.placeholder.com/50x50'}}" alt="">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">{{$reply->author}}
                                                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                                                    </h4>
                                                                    <p>{{$reply->body}}</p>
                                                                </div>

                                                            </div>
                                                            <!-- End Nested Comment -->
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                @endif

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(".toggle-reply").click(function(){
            $(this).next().slideToggle("fast");
        });
    </script>
@stop
