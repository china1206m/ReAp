<?php
// セッション開始
session_start();
if(!isset($_SESSION['user_id'])) {
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:U-AC6.php');
  exit;
}
// POSTで送信されている 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include "MU.php";
  $update = new MU();
  $column = ["user_mail", "user_pass"];
  $post = [$_POST['user_mail'], $_POST['user_pass']];
  $type = [1, 1];
  $id_name = "user_id";
  $id = $_SESSION['user_id'];

  $update->update("user", $column, $post, $type, $id_name, $id);

  header('Location:U-AC3.php');
  exit;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-AC5</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="U-AC5.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
  <link rel="stylesheet" href="button.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
  <main id="main">
  <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>
    
    <form action="" method="POST"> 
        
        <td><p><label for="user_mail" >メールアドレス<span class="require">必須</span></label></p></td>
        <input type="email" class="user" name="user_mail" value="" maxlength="30" placeholder="〇〇〇＠△△△" required>
        
        
        <p><label for="user_pass" >パスワード<span class="require">必須</span></label></p>
        <input type="password" class="user" class="form-control" name="user_pass" id="password" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" placeholder="半角英数字８-１６文字" required>

        <div class="form-group" class="form-wrapper">
            <p><label for="user_mail" >パスワード（確認）<span class="require">必須</span></label></p>
            <input type="password" class="user" class="form-control" name="user_pass" id="confirm" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$"  oninput="CheckPassword(this)" required>
            <i id="eye" class="fa-solid fa-eye"></i>
        </div>

        <br>
        <br>
        <center>
            <button type="submit" class="button-only">変更する</button>
        </center>
    </form>
</main>

<aside id="sub">
    <ul class="menu">
      <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-PL1.html"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-FV2.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
      </ul>
  </aside>

  <script>
    function CheckPassword(confirm){
        // 入力値取得
        var input1 = password.value;
        var input2 = confirm.value;
        // パスワード比較
        if(input1 != input2){
            confirm.setCustomValidity("入力値が一致しません。");
        }else{
            confirm.setCustomValidity('');
        }
    }
  </script>

<!--パスワードの目隠しについて-->
<script>
    let eye = document.getElementById("eye");
    eye.addEventListener('click', function () {
         if (this.previousElementSibling.getAttribute('type') == 'password') {
              this.previousElementSibling.setAttribute('type', 'text');
              this.classList.toggle('fa-eye');
              this.classList.toggle('fa-eye-slash');
         } else {
              this.previousElementSibling.setAttribute('type', 'password');
              this.classList.toggle('fa-eye');
              this.classList.toggle('fa-eye-slash');
         }
    })
  </script>

  </body>
  </html>