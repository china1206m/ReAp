<?php
/* セッション開始 */
session_start();
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* usernameとpasswordが定義されて、かつ空白ではない */
  if (isset($_POST['user_name'], $_POST['user_pass']) && $_POST['user_name'] !== '' && $_POST['user_pass'] !== '')  {
    /* データベース接続 */
    include "MC-01.php";
    $db = getDB();
 
    /* ユーザー認証 */
    $stmt = $db->prepare('SELECT * FROM user WHERE user_name=? AND user_pass=?');
    $stmt->bindValue(1, $_POST['user_name']);
    $stmt->bindValue(2, $_POST['user_pass']);
    $stmt->execute();
 
    $result = $stmt->fetchAll();

    // ログインが成功したら
    if (count($result) === 1) {
        // userIDを取得
        $stmt = $db->prepare('SELECT user_id FROM user WHERE user_name=? AND user_pass=?');
        $stmt->bindValue(1, $_POST['user_name']);
        $stmt->bindValue(2, $_POST['user_pass']);
        $stmt->execute();

        // セッションでイベントユーザIDを保持
        foreach ($stmt as $row) {
            $_SESSION['user_id'] = $row['user_id'];
            header('Location:E-AC3.php');
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
  <title>画面ID U-AC6</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="U-AC6.css">
    <link rel="stylesheet" href="button.css">
  </head>
<body bgcolor="#f0f8ff" >

<section>
<center>
  <div class="box1">
    <form action="" method="POST">   
<br>
ユーザ名：
<input type="text" name="user_name" maxlength="30" id="user" required>
<br>
<br>
<div class="form-wrapper">
パスワード：
<input type="password" name="user_pass" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" required>
<i id="eye" class="fa-solid fa-eye"></i></div>
<br>
<div class="box_error">
  <!--ここにかいてね-->
  ユーザ名またはパスワードが異なります。
</div>
<button type="submit" name="login" class="button-only" onclick="regit()">登録する</button>
      
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


</body>
</html>