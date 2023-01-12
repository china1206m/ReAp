<?php
/* セッション開始 */
session_start();
 
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* usernameとpasswordが定義されて、かつ空白ではない */
  if (isset($_POST['eventuser_name'], $_POST['eventuser_pass']) && $_POST['eventuser_name'] !== '' && $_POST['eventuser_pass'] !== '')  {

    /* データ挿入 */
    // 呼び出し
    include "MA.php";
    // addインスタンス生成
    $add = new MA();

    // 入力したいカラム名を指定
    $column = ['eventuser_mail','eventuser_pass', 'eventuser_name'];
    
    // 入力された値をpost配列に格納
    $post = [$_POST['eventuser_mail'], $_POST['eventuser_pass'], $_POST['eventuser_name']];

    // 入力された値の型を定義
    $type = [1,1,1];

    // 引数としてテーブル名、追加する値、追加する値の型 返り値としてID
    $_SESSION['eventuser_id'] = $add->ma_return("eventuser",$column, $post, $type);

    header('Location:E-AC3.php');
    exit;
  } else {
    $_SESSION['register_message'] = '送信データが正しくありません';
    header('Location:'.$_SERVER['PHP_SELF']);
    exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" media="screen" href="E-AC2.css">
    <link rel="stylesheet" media="screen" href="button.css">
    <title>E-AC2</title>
    
</head>

<body>
    <section>
        <div class="box1"><h3 align="center">アカウント登録</h3></div>   

        <div align="center" class="box2">
            <form action="" method="POST">
                <p>　　　　　　ユーザ名：<input type="text" name="eventuser_name" maxlength="30" required></p>
                <p>　　　メールアドレス：<input type="email" name="eventuser_mail" required></p>
               
                <div class="form-group" class="form-wrapper">
                <p>　　　　　パスワード：<input type="password" class="form-control" name="eventuser_pass" id="password" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" required><i id="eye" class="fa-solid fa-eye"></i></p>
                </div>
               
                <div class="form-group" class="form-wrapper">
                <p>パスワード (再確認）：<input type="password" class="form-control" name="confirm" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" oninput="CheckPassword(this)" required><i id="eye" class="fa-solid fa-eye"></i></p>
                </div>
                <button align="center" type="submit" class="button-only">登録する</button>
            </form>
        </div>
    </section>

<style>
    .form-wrapper {
         display: flex;
         justify-content: center;
         gap: 10px;
         margin: 10px 0;
         width: 250px;
    }

    #eye {
         display: flex;
         align-items: center;
         width: 25px;
         height: 25px;
         cursor: pointer;
    }
</style>

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