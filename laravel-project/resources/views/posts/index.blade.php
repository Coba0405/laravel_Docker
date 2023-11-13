<!-- どこのファイルをテンプレートと紐づけているか 同じviewファイルなのでそこより前は省略される「layoutsのapp.blade.php」の意味になる -->
@extends('layout.app')
<!-- 第一引数の'title'はapp.blade.phpの'title'を呼び出していて第二引数でなんの文字を表示するかを表すのでタイトルは'TOP page'を表す -->
@section('title', 'TOP page')

<!-- app.blade.phpの'content'を呼び出していてyield部分にあたる　bladeの階層で表現？ -->
@section('cntent')
