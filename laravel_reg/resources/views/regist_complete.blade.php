<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel = "stylesheet" type = "text/css" href = "{{asset('/css/style.css')}}">
        <title>アカウント登録完了画面</title>
    </head>
    <body>
        <ul class = "header">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>D.I.Blogについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
        <h2 class = "complete_h2">アカウント登録完了画面</h2>
        <div class = "complete_message">
            @if(session('flash_message'))
                    <h1>{{ session('flash_message')}}</h1>
            @endif
        </div>
        <div class = "complete_error_message">
            @if(session('flash_error_message'))
                    <h1>{{ session('flash_error_message')}}</h1>
            @endif
        </div>
        <footer>Copyright D.I.Works | D.I.blog is the one which provides A to Z about programming</footer>
    </body>
</html>