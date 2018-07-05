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
                   <button class="btn btn-dark avatar-button" style="margin-top: 10px;">Поменять аватарку</button>
                   <div class="avatar-change" style="display: none;">
                   <form method="POST" action="{{route('avatar',[$profileUser->name])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <input type="file" id="avatar" name="avatar" accept="image/*"/>
                    
                    <br>
                    <button type="submit" class="btn btn-danger">Отправить</button>
                    </form>
                </div>
                </div>
                @endauth
               @if (count($themes) > 0) 
                <h3>Созданные темы</h3>
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
            </div>
        </div>
    </div>
    <script>
$(document).ready(function(){
    $(".avatar-button").click(function(){
        $(".avatar-button").hide();
        $(".avatar-change").show();
    });
});
</script>
@endsection