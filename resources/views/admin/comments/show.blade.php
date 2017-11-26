@extends('layouts.admin')

@section('content')
    <h1>Comments for post #{{$post->id}}</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Post Id</th>
            <th>Author</th>
            <th>Author's photo</th>
            <th>Author's email</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td><a href="{{route('home.post', $comment->post_id)}}">{{$comment->post_id}}</a></td>
                    <td>{{$comment->author}}</td>
                    <td><img height="50" src="{{$comment->photo ? $comment->photo : 'http://via.placeholder.com/50x50'}}" alt=""></td>
                    <td>{{$comment->email}}</td>
                    <td>{{str_limit($comment->body, 20)}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->updated_at}}</td>
                    <td>
                        @if($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Disapprove', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop