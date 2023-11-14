@extends('layouts.app')
@section('title', 'Detail page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-1 offset-md-2">
            <div class="card">
                <div class="card-header">
                    {{ $post->id }}
                </div>
                <div class="card-body">
                    <p class="card-title">{{ $post->title }}</p>
                    <p class="card-text">{{ $post->body }}</p>
                    <div class="card-footer bg-transparent"><span class="font-weight-bold">by:</span> {{ $user->name }}
                    </div>
                    @auth
                    <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-dark">編集</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection