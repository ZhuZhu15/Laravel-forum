@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>
                        {{ $profileUser->name }}
                        <small>Профиль был создан {{ $profileUser->created_at->format('d-m-Y') }} в {{ $profileUser->created_at->format('H:i:s') }}</small>
                    </h1>
                   <img src="../storage/{{$profileUser->img}}"/>
                   <br/>
                   @auth
                   @if (auth()->user()->id == $profileUser->id)
                   <button class="btn btn-dark avatar-button" style="margin-top: 10px;">Поменять аватарку</button>
                   <div class="avatar-change" style="display: none;">
                   <form method="POST" action="{{route('avatar',[$profileUser->name])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" id="avatar" name="avatar" accept="image/*"/>
                    <br>
                    <button type="submit" class="btn btn-danger">Отправить</button>
                    </form>
                </div>
                <br/>
                <a href="{{route('read-message',[auth()->user()->name])}}" class="btn btn-success">Мои сообщения</a>
                @endif
                @if (auth()->user()->id != $profileUser->id)
                <button class="btn btn-dark message-button" style="margin-top: 10px">Написать {{$profileUser->name}} сообщение</button> 
                <div class="send-message" style="display:none">
                <form action="{{route('send-message', $profileUser->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                    <div class="form-group col-sm-6">
                    <label for="usr">Article:</label>
                    <input type="text" class="form-control" id="article" name="article">
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-sm-6">
                    <label for="pwd">Message:</label>
                    <textarea type="text" class="form-control" id="body" name="body"></textarea>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Отправить</button>
                    </div>
                </form>
                <button class="btn-dark message-button" style="margin-top: 10px; display:none">Отмена</button>
                </div>
                @endif
                @endauth
                <div id="user-activity-info">
                @if (count($themes) > 0)
                <h3>Созданные темы: </h3>
                @foreach ($themes as $theme)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                               <span class="flex">
                                    <a href="{{route('theme',[$theme->channel->name, $theme->id])}}">{{ $theme->name }}</a> опубликовал:                                   
                               </span>
                                <span>{{ $theme->created_at->format('d-m-Y | H:i:s') }}</span>
                            </div>
                        </div>

                        <div class="panel-body">
                            {{ $theme->body }}
                        </div>
                    </div>
                @endforeach
                {{ $themes->links() }}
                @endif
                @if (count($comments) > 0) 
                <h3>Последние комментарии: </h3>
                @foreach ($comments as $comment)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <span>{{ $comment->created_at }}</span>
                            </div>
                        </div>

                        <div class="panel-body">
                            {{ $comment->body }} в теме <a href="{{route('theme',[$comment->theme->channel->name, $comment->theme->id])}}">{{$comment->theme->name}}</a>
                        </div>
                    </div>
                @endforeach
                @endif
                <div id="user-activity-info">
            </div>
        </div>
    </div>
    <script>
$(document).ready(function(){
    $(".avatar-button").click(function(){
        $(".avatar-button").hide();
        $(".avatar-change").show();
    });

    $(".message-button").click(function(){
        $(".message-button").toggle();
        $(".send-message").toggle();
    });
});
</script>
@endsection