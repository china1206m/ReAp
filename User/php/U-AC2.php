<?php
/* セッション開始 */
session_start();
 
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* usernameとpasswordが定義されて、かつ空白ではない */
  if (isset($_POST['user_name'], $_POST['user_pass']) && $_POST['user_name'] !== '' && $_POST['user_pass'] !== '')  {

    /* データ挿入 */
    // 呼び出し
    include "MA.php";
    // addインスタンス生成
    $add = new MA();

    // 入力したいカラム名を指定
    $column = ['user_mail','user_pass', 'user_name', 'coupon_can_get', 'report_total'];
    
    // 入力された値をpost配列に格納
    $post = [$_POST['user_mail'], $_POST['user_pass'], $_POST['user_name'], 0, 0];

    // 入力された値の型を定義
    $type = [1,1,1,0,0];

    // 引数としてテーブル名、追加する値、追加する値の型 返り値としてID
    $_SESSION['user_id'] = $add->ma_return("user",$column, $post, $type);

    header('Location:U-HK6.php');
    exit;
  } else {
    $_SESSION['register_message'] = '送信データが正しくありません';
    header('Location:'.$_SERVER['PHP_SELF']);
    exit;
    }
}
?>

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



  
    <form action="" method="POST">  

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