@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h4>Темы Рубрики <b><a href="{{route('channel', $channel->name)}}">{{$channel->name}}</a>->{{$theme->name}}</b></h4>
                    </div>
                    <div class="float-right">
                       
                    </div> 
            
            </div>
                
                <div class="card-body">
                    @foreach ($comments as $comment) 
                    <b>{{$comment->owner->name}}</b> написал:<br/>
                    {{$comment->body}}<br/>
                    @endforeach
                   {{ $comments->links() }}
                </div>
            </div>
            
            @auth
            <form action="{{route('create-comment',[$channel->name,$theme->id])}}" method="POST" >
            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Оставить комментарий:</label>
                                <input type="text" class="form-control" id="body" name="body"
                                       value="{{ old('body') }}" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Оставить комментарий</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
            @endauth
        </div>
    </div>
</div>
@endsection