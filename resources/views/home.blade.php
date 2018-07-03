@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Рубрики</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($channels as $channel)
                      <a href="channels/{{$channel->name}}"><h2>{{ $channel->name }}</h2></a>
                      <p>{{ $channel->body }}</p>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
