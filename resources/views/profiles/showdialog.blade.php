@extends('layouts.app')

@section('content')
<div class="container">
<h1>Диалоги:</h1>
@foreach ($users as $user)

                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                            <div class="level">
                               <span class="flex">
                                    <a href="{{route('current-message',[auth()->user()->name, $user->name])}}"><h3>{{ $user->name }}</h3></a><!--последнее сообщение {{$user->messages_to_user->sortByDesc('updated_at')->take(1)}}-->                                   
                               </span>
                            </div>
                        </div>

                    </div> 
                @endforeach
                </div>
@endsection