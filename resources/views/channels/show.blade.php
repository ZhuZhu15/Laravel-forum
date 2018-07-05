@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h4>Темы Рубрики <b>{{$channel->name}}</b></h4>
                    </div>
                    @auth
                    <div class="float-right">
                        <a href="{{$channel->name}}/createtheme" class="btn btn-success">Создать тему</a>
                    </div> 
                    @endauth
            </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   @foreach ($themes as $theme) 
                    <a href="{{route('theme',[$channel->name, $theme->id])}}">{{$theme->name}}</a> <br>
                     @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection