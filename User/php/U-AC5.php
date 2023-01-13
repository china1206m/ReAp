<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-HK10</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="U-AC5.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">アカウント情報変更</h3>
    
    <form action="U-HK3.php" method="POST"> 
        
        <td><p><label for="user_mail" >メールアドレス<span class="require">必須</span></label></p></td>
        <input type="email" class="user" name="user_mail" value="" maxlength="30" placeholder="〇〇〇＠△△△" required>
        
        
        <p><label for="user_pass" >パスワード<span class="require">必須</span></label></p>
        <input type="password" class="user" class="form-control" name="user_pass" id="password" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" placeholder="半角英数字８-１６文字" required>

        <div class="form-group" class="form-wrapper">
            <p><label for="user_mail" >パスワード（確認）<span class="require">必須</span></label></p>
            <input type="password" class="user" class="form-control" name="user_pass" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$"  oninput="CheckPassword(this)" required>
            <i id="eye" class="fa-solid fa-eye"></i>
        </div>

        <br>
        <br>
        <center>
            <button type="submit" class="button-only">登録する</button>
        </center>
    </form>
</main>

<aside id="sub">
    <ul class="menu">
      <li class="menu-list"><a class="menu-button" href="U-HK1.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-PL1.php"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-FV1.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
      </ul>
  </aside>


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