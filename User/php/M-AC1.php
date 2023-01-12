<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-AC1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="M-AC1.css">
    <link rel="stylesheet" href="M_menu.css">
  </head>
<body bgcolor="#f0f8ff" >
<!--if文はphp内で書くらしい-->
<section>
<center>
  <div class="box1">
    <form action="" method="POST">   
<br>
ユーザ名：
<input type="text" name="eventuser_name" maxlength="30" id="user" required>
<br>
<br>
<br>
<div class="form-wrapper">
パスワード：
<input type="password" name="eventuser_pass" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" required>
<i id="eye" class="fa-solid fa-eye"></i></div>

<br>
<br>
<br>
<button type="submit" name="login" class="button-only" onclick="regit()">ログイン</button>
      
</div>
</form>
</div>
</center>

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

<script>
  //ログイン出来なかったときにエラー表示する場所
  //このif文はユーザ名があいうえおの時にエラー表示するようになっているのでif文自体は無視してください。
  function regit(){
    const textbox = document.getElementById("user");
    const value = textbox.value
    if(value=="あいうえお"){
    alert('ユーザ名またはパスワードに誤りがあります。')
    }
  }
</script>
</body>
</html>