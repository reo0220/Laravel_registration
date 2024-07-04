<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel = "stylesheet" type = "text/css" href = "{{asset('/css/style.css')}}">
        <title>アカウント登録確認画面</title>
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
        <main>
            <h2>アカウント登録確認画面</h2>
            <ul class = "ul">
                <li>
                    <label class ="form_name">名前（姓）</label>
                    <p>{{$family_name}}</p>
                </li>
                <li>
                    <label class ="form_name">名前（名）</label>
                    <p>{{$last_name}}</p>
                </li>
                <li>
                    <label class ="form_name">カナ（姓）</label>
                    <p>{{$family_name_kana}}</p>
                </li>
                <li>
                    <label class ="form_name">カナ（名）</label>
                    <p>{{$last_name_kana}}</p>
                </li>
                <li>
                    <label class ="form_name">メールアドレス</label>
                    <p>{{$mail}}</p>
                </li>
                <li>
                    <label class ="form_name">パスワード</label>
                    <p><?php
                        for($i = 0;$i < mb_strlen($password);$i++){ //文字数分●表示
                                echo "●"; 
                        };?></p>
                </li>
                <li>
                    <label class ="form_name">性別</label>
                    <p>{{$gender}}</p>
                </li>
                <li>
                    <label class ="form_name">郵便番号</label>
                    <p>{{$postal_code}}</p>
                </li>
                <li>
                    <label class ="form_name">住所（都道府県）</label>
                    <p>{{$prefecture}}</p>
                </li>
                <li>
                    <label class ="form_name">都道府県（市区町村）</label>
                    <p>{{$address_1}}</p>
                </li>
                <li>
                    <label class ="form_name">都道府県（番地）</label>
                    <p>{{$address_2}}</p>
                </li>
                <li>
                    <label class ="form_name">アカウント権限</label>
                    <p>{{$authority}}</p>
                </li>
                <form method = "GET" action ="/form">
                    <input type = "submit" class = "botton_back" value = "前に戻る">
                </form>
                
                <form method = "POST" action ="/complete">
                    <input type = "submit" class = "botton_regist" value = "登録する">
                </form>    
            </ul>
        </main>
    </body>
</html>