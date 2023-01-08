<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" media="screen" href="E-AC8.css">
    <link rel="stylesheet" media="screen" href="E_button.css">
    <link rel="stylesheet" href="E-menu.css" type="text/css">
    <title>E-AC8</title>
    
</head>

<body>
    <main id="main">
        <button type="button" class="button_back" onclick="history.back()">＜</button><h3 class="button_back">アカウント情報変更</h3>
   
    <section>
        
            <form action="E-AC3.php" method="POST">
                <p><label for="user_mail" >メールアドレス<span class="require">必須</span></label></p>
                <input type="email" class="user_mail" name="user_mail" value="" placeholder="firstmail@gmail.com" required>
               
                <div class="form-group">
                <p><label for="user_pass" >パスワード<span class="require">必須</span></label></p>
                <input type="password" class="user_pass" class="form-control" name="user_pass" id="password" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" placeholder="半角英数字8-16文字" required>
                </div>
               
                <div class="form-group" class="form-wrapper">
                <p><label for="user_pass_admit" >パスワード（確認）<span class="require">必須</span></label></p>
                <input type="password" class="user_pass" class="form-control" name="user_pass" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" oninput="CheckPassword(this)" required>
                <i id="eye" class="fa-solid fa-eye"></i>
                </div>

            </section>
            <center>
                <button type="submit" class="button-only">登録する</button>
                </center>
            </form>
    
</main>

<aside id="sub">
    <ul>
        <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.html"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.html"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-AC3.html"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
    </ul>
  </aside>

    <!--パスワードの一致判定について-->
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