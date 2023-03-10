<?php
/* セッション開始 */
session_start();
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* usernameとpasswordが定義されて、かつ空白ではない */
  if (isset($_POST['administrator_name'], $_POST['administrator_pass']) && $_POST['administrator_name'] !== '' && $_POST['administrator_pass'] !== '')  {
    /* データベース接続 */
    include "MC-01.php";
    $db = getDB();
 
    /* ユーザー認証 */
    $stmt = $db->prepare('SELECT * FROM administrator WHERE administrator_name=? AND administrator_pass=?');
    $stmt->bindValue(1, $_POST['administrator_name']);
    $stmt->bindValue(2, $_POST['administrator_pass']);
    $stmt->execute();
 
    $result = $stmt->fetchAll();

    // ログインが成功したら
    if (count($result) === 1) {
        // eventuserIDを取得
        $stmt = $db->prepare('SELECT administrator_id FROM administrator WHERE administrator_name=? AND administrator_pass=?');
        $stmt->bindValue(1, $_POST['administrator_name']);
        $stmt->bindValue(2, $_POST['administrator_pass']);
        $stmt->execute();

        // セッションでイベントユーザIDを保持
        foreach ($stmt as $row) {
            $_SESSION['administrator_id'] = $row['administrator_id'];
            header('Location:M-HK1.php');
            exit;
        }
    }
  }
  /* 正しくログインできなかった */
  $_SESSION['login_message'] = '送信データが正しくありません';
  header('Location:'.$_SERVER['PHP_SELF']);
  exit;
}
?>

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
<input type="text" name="administrator_name" maxlength="30" id="user" required>
<br>
<br>
<br>
<div class="form-wrapper">
パスワード：
<input type="password" name="administrator_pass" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" required>
<i id="eye" class="fa-solid fa-eye"></i></div>

<br>
<!--エラーメッセージ-->
<p class="fail">ログインに失敗しました</p>
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