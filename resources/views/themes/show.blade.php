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
                @if (count($comments)>0)
                    @foreach ($comments as $comment)
                    <img src="../../storage/{{$comment->owner->img}}" style="max-width: 35px;"/> 
                    <a href="{{route('profile', $comment->owner->name)}}"><b>{{$comment->owner->name}}</b></a> написал:<br/>
                    {{$comment->body}}<br/>
                @can('update', $comment)
                <form method="POST" action="{{route('delete-comment', $comment->id)}}">
                {{ csrf_field() }}
                <!--{{ method_field('DELETE') }}-->
                <button type="submit" class="btn btn-danger btn-xs">Удалить</button>
                </form>
                @endcan
                    @endforeach
                   {{ $comments->links() }}
                @else комментариев пока нет
                @endif  
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
                        @else
                        Чтобы оставить комментарий залогиньтесь
            @endauth
        </div>
    </div>
</div>
@endsection