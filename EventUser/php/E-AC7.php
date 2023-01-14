<html>
<head>
  <title>画面ID E-AC7</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="E-AC7.css" type="text/css">
  <link rel="stylesheet" href="E_button.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()">＜</button><h3 class="button_back">プロフィール編集</h3>

  <center>
    <p class="image-circle"></p>
    <br>
    <form action="E-AC3.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="profiel_image" class="profiel_image" accept="image/jpeg,image/png">
     
    </center>

              <p><label for="user_name" >ユーザ名<span class="require">必須</span></label></p>
              <input type="text" class="txt" name="user_name" maxlength="20" placeholder="20文字以内" required>
                
              <p><label for="message" >一言コメント</label></p>
                <p><textarea class="tarea" name="profiel_message">テキストエリア</textarea></p>
                
    <center>
               <button type="submit" class="button-only">変更する</button>
            </form>
    </center>
  </main>
    <aside id="sub">
  
      <ul>
        <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CP1.php"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
      </ul>
    </aside>
</body>