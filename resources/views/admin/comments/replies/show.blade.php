@extends('layouts.admin')

@section('content')
    <h1>Replies for comment #{{$comment->id}}</h1>

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
        @if($replies)
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->slug)}}">{{$reply->comment_id}}</a></td>
                    <td>{{$reply->author}}</td>
                    <td><img height="50" src="{{$reply->photo ? $reply->photo : 'http://via.placeholder.com/50x50'}}" alt=""></td>
                    <td>{{$reply->email}}</td>
                    <td>{{str_limit($reply->body, 20)}}</td>
                    <td>{{$reply->created_at}}</td>
                    <td>{{$reply->updated_at}}</td>
                    <td>
                        @if($reply->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Disapprove', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
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