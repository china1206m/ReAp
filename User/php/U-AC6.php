<?php
/* セッション開始 */
session_start();
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* usernameとpasswordが定義されて、かつ空白ではない */
  if (isset($_POST['user_mail'], $_POST['user_pass']) && $_POST['user_mail'] !== '' && $_POST['user_pass'] !== '')  {
    /* データベース接続 */
    include "MC-01.php";
    $db = getDB();
 
    /* ユーザー認証 */
    include "MGvG.php";
    $post = [null,$_POST['user_mail'],$_POST['user_pass']];
    $stmt = MG("user",$post);
 
    $count = $stmt->rowCount();

    // ログインが成功したら
    if ($count == 1) {
        // userIDを取得
        // セッションでイベントユーザIDを保持
        foreach ($stmt as $row) {
            $_SESSION['user_id'] = $row['user_id'];
            header('Location:U-HK6.php');
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
メールアドレス：
<input type="email" name="user_mail" maxlength="30" placeholder="〇〇＠△△" required>
<br>
<br>
<div class="form-wrapper">
パスワード：
<input type="password" name="user_pass" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" required>
<i id="eye" class="fa-solid fa-eye"></i></div>
<br>
<div class="box_error">
  <!--ここにかいてね-->
  <?php
    if (isset($_SESSION['login_message'])) {
      echo($_SESSION['login_message']);
    }
  ?>
</div>
<button type="submit" name="login" class="button-only" onclick="regit()">ログイン</button>
<a class="already" href="U-AC2.php">新規登録の方はこちらから</a>
      
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

<?php
/* セッションの初期化 */
$_SESSION['login_message'] = '';
?>