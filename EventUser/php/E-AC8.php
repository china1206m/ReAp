<?php

/* セッション開始 */
session_start();

//フォームの初期値に編集前の情報格納
include "MG.php";

$id = 1;
$db = MG_02($id,"","","","","","","","","");
$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);
 
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  include "MU.php";

  $update = new MU();

  $column = ['enterprise_name', 'representative_name', 'phone_number', 'eventuser_mail', 'address', 'eventuser_pass'];
  
  $post = [$_POST['enterprise_name'], $_POST['representative_name'], $_POST['phone_number'], $_POST['eventuser_mail'], $_POST['address'], $_POST['eventuser_pass']];
  
  $type = [2, 2, 0, 1, 2, 1];

  $id_name = "eventuser_id";

  $id = $_SESSION['eventuser_id'];
  
  $update->mu("eventuser", $column, $post, $type, $id_name, $id);

  header('Location:E-AC3.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
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
        <form action="" method="post">

        <table>
                <tr>
                    <td><p><label for="enterprise_name" >企業名<span class="require">必須</span></label></p></td>
                    <td><p><label for="representative_name" >代表者名<span class="require">必須</span></label></p></td>
                </tr>
                <tr>
                    <td><input type="text" class="user_mail" name="enterprise_name" value="" placeholder="１００文字以内" maxlength="100" required></td>
                    <td><input type="text" class="user_mail" name="representative_name" placeholder="山田太郎" maxlength="20" required></td>
                </tr>
                <tr>
                    <td><p><label for="phone_number" >電話番号<span class="require">必須</span></label></p></td>
                    <td><p><label for="user_mail" >メールアドレス<span class="require">必須</span></label></p></td>
                </tr>
                <tr>
                    <td><input type="tel" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" class="user_mail" name="phone_number" value="" placeholder="数字のみ" required></td>
                    <td><input type="email" class="user_mail" name="eventuser_mail" value="" placeholder="first@mail.com" maxlength="30" required></td>
                </tr>
                
            </table>
        
                <p><label for="address" >住所<span class="require">必須</span></label></p>
                <p><textarea class="tarea" name="address" placeholder="東京都渋谷区神宮前一丁目二番三号" maxlength="50" required></textarea></p>
            
               <table>
                <tr>
                    <td><div class="form-group">
                <p><label for="user_mail" >パスワード<span class="require">必須</span></label></p>
                <input type="password" class="user_pass" class="form-control" name="eventuser_pass" id="password" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" placeholder="半角英数字８-１６文字" required>
                </div></td>
               <td>
                <div class="form-group" class="form-wrapper">
                <p><label for="user_mail" >パスワード（確認）<span class="require">必須</span></label></p>
                <input type="password" class="user_pass" class="form-control" name="user_pass" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$"  oninput="CheckPassword(this)" required>
                <i id="eye" class="fa-solid fa-eye"></i>
                </div>
                </td>
                </tr>
                </table>
            <center>
                <button type="submit" class="button-only">変更する</button>
            </center>
        </section>
        </form>
    
</main>

<aside id="sub">
    <ul>
        <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CP1.html"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
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