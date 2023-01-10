<?php
/* セッション開始 */
session_start();
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* usernameとpasswordが定義されて、かつ空白ではない */
  if (isset($_POST['eventuser_name'], $_POST['eventuser_pass']) && $_POST['eventuser_name'] !== '' && $_POST['eventuser_pass'] !== '')  {
    /* データベース接続 */
    include "MC-01.php";
    $db = getDB();
 
    /* ユーザー認証 */
    $stmt = $db->prepare('SELECT * FROM eventuser WHERE eventuser_name=? AND eventuser_pass=?');
    $stmt->bindValue(1, $_POST['eventuser_name']);
    $stmt->bindValue(2, $_POST['eventuser_pass']);
    $stmt->execute();
 
    $result = $stmt->fetchAll();

    // ログインが成功したら
    if (count($result) === 1) {
        // eventuserIDを取得
        $stmt = $db->prepare('SELECT eventuser_id FROM eventuser WHERE eventuser_name=? AND eventuser_pass=?');
        $stmt->bindValue(1, $_POST['eventuser_name']);
        $stmt->bindValue(2, $_POST['eventuser_pass']);
        $stmt->execute();

        // セッションでイベントユーザIDを保持
        foreach ($stmt as $row) {
            $_SESSION['eventuser_id'] = $row['eventuser_id'];
            header('Location:E-EL1.html');
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
  <title>画面ID E-AC4</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="E-AC4.css">
    <link rel="stylesheet" href="E_button.css">
  </head>
<body bgcolor="#f0f8ff" >

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
<div class="box_error">
  <!--ここにかいてね-->
  ユーザ名またはパスワードが異なります。
</div>
<br>
<button type="submit" name="login" class="button-only">ログイン</button>
      
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