<!-- どこのファイルをテンプレートと紐づけているか 同じviewファイルなのでそこより前は省略される「layoutsのapp.blade.php」の意味になる
@extends('layouts.app')
<!-- 第一引数の'title'はapp.blade.phpの'title'を呼び出していて第二引数でなんの文字を表示するかを表すのでタイトルは'TOP page'を表す -->
@section('title', 'TOP page')

<!-- app.blade.phpの'content'を呼び出していてyield部分にあたる　bladeの階層で表現？ -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-1 offset-md-2">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th colspan="3">タイトル</th>
                        <th colspan="3">内容</th>
                    </tr>

                    <!-- @foreachと@endforeachで囲んでいる -->
                    @foreach ($posts as $post)

                        <tr>
                            <!-- {{ }}を使用することで変数を表示できる -->
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td>
                                <!-- 詳細ページへのリンク -->
                                <a href="{{ url('posts/'.$post->id) }}" class="btn btn-success">詳細</a>
                                <!-- @auth @endauthで囲んでいてログインしている時表示する -->


                                <!-- ログインしている場合のみ削除ボタンを表示 -->
                                @auth
                                    <form action="/posts/delete/{{$post->id}}" method="POST">
                                <!-- {{ cdrf_field()}} はPOST,PUT,DELETEのリクエストをした時に認証済みユーザーのトークンと一致するか確認するコマンド -->

                                        {{ csrf_field() }}
                                        <input type="submit" value="削除" class="btn btn-danger post_del_btn">
                                    </form>
                                @endauth
                                <!-- ログインしていない時に表示させたい時は「@guest-@endguest」を使用するといい感じになる
                                @guest
                                    "ログインしていません。"
                                @endguest -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection -->