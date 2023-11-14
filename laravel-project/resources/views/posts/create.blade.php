@extends('layouts.app')
@section('title', 'Create page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-1 offset-md-2">
            <form action="/posts" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">新規投稿</label>
                </div>
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="form-contropl" type="text" name="title" id="title" rows="2">
                </div>
                <div class="form-group">
                    <label for="body">コメント</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="text-center mt-3">
                    <input class="btn btn-primary" type="submit" value="投稿する" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection