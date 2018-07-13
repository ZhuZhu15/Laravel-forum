@extends('layouts.app')

@section('content')
<div class="container">
<h1>Диалог с <a href="{{route('profile', $with_user->name)}}">{{ $with_user->name }}:</h1></a>
@foreach ($messages as $message)

                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                            <div class="level">
                               <span class="flex">
                               <p>{{ $message->user_message_from->name }} ({{$message->updated_at}}):<br> {{$message->body}}<p>                                 
                               </span>
                            </div>
                        </div>

                    </div> 
                @endforeach
                <form action="{{route('send-message', $with_user->id)}}" method="POST">
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
                </div>
@endsection