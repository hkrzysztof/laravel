@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Link to post</th>
                <th>Comments</th>
                <th>Author</th>
                <th>Photo Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Category Id</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('home.post', $post->slug)}}">View</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">View all</a></td>
                    <td>{{$post->user->name}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/50x50'}}" alt="post_photo"></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 20)}}</td>
                    <td>{{$post->category_id ? $post->category->name : 'No category'}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@stop