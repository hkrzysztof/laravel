@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_photo'))
        <p class="bg-danger">{{session('deleted_photo')}}</p>
    @endif

    <h1>Media</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Picture</th>
                <th>Created</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($photos)
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><img height="100" src="{{$photo->file}}" alt="picture"></td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'null'}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete picture', ['class'=>'btn btn-danger']) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop