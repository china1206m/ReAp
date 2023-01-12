<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-AC2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="U-AC2.css">
    <link rel="stylesheet" href="button.css">
  </head>
<body >



  
    <form action="U-HK3.php" method="POST">  

        <center>
        <h3>アカウント登録</h3>
        </center>

        <p><label for="user_name" >ユーザ名<span class="require">必須</span></label></p>
        <input type="text" class="user" name="user_name" value="" maxlength="20" placeholder="３０文字以内" required>


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