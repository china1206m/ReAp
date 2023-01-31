<?php 
session_cache_limiter("none");
session_start();

include "MG.php";

  $coupon_id = $_SESSION['coupon_id'];

  $db = MG_09($coupon_id,"","","","","","");
  $coupon = $db->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include "MD.php";
  $delete = new MD();
  $type = [1];
  $result = $delete->md("get_coupon", "get_coupon_id", $_SESSION['get_coupon_id'], $type);
  //session_destroy(); // セッションを破壊
  //完了画面出すなら
  //モジュールでエラーのとき特定の数字を返り値として渡してほしい
  if($result==-1){
    //error
    header('');
  }else{
  //正常時処理 完了画面
    header('Location:U-AC14.php');
    exit;
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>U-AC16</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="U-AC16.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
  
</head>
<body>

<main id="main">
<button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button>
    <center>
    <hr class="top">

    <p class="coupon">都道府県：<?php print($coupon[0]['coupon_prefectures']); ?></p>
    <hr class="middle">
    <p class="coupon">　　店名：<?php print($coupon[0]['coupon_place']); ?></p>
    <hr class="middle">
    <p class="coupon">使用期限：<?php print($coupon[0]['coupon_deadline']); ?></p>
    <hr class="middle">
    <p class="coupon">　　詳細：<?php print($coupon[0]['coupon_content']); ?></p>
    <hr class="under">

    <div class="delay">
    <button id="open-btn" class="overlay-event" name="coupon_delay" type="button">使用する</button>
    </div>

    <div id="overlay">
      <div class="flex">
      <form action="" method="POST" id="form1">
        <div id="overlay-inner">
          <p>上記のクーポンを使用します。</p>
          <p>本当によろしいですか。</p>
          <!--idはデザイン-->
          <button id="close-btn" class="send-btn" type=button disabled>はい</button>
          <!--はいを押したら消去機能呼び出し-->
          <button id="close-btn" class="close" type=button disabled>いいえ</button>
        </div>
      </form>
      </div>
    </div>
    </center>

</main>

<aside id="sub">
    <ul class="menu">
        <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-PL1.html"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-FV2.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
    </ul>
</aside>
            

<script>
  var overlayev = document.getElementsByClassName("overlay-event");
  var send = document.getElementsByClassName("send-btn");
  var close = document.getElementsByClassName("close");

  //オーバーレイ開閉の関数
  const overlay = document.getElementById('overlay');
  function overlayToggle() {
    overlay.classList.toggle('overlay-on');
  }


  overlayev[0].addEventListener('click', function(){
    overlayev[0].setAttribute("disabled","");
    send[0].removeAttribute("disabled");
    close[0].removeAttribute("disabled");
    //オーバーレイ開く
    overlayToggle();
    return false;
  }, false);
  //'いいえ'が押されたとき
  close[0].addEventListener('click', function(){
    // ダブルクリック防止
    close[0].setAttribute("disabled","");
    overlayev[0].removeAttribute("disabled");
    //オーバーレイ閉じる
    overlayToggle();
 }, false);

  send[0].addEventListener('click', function(){
    // ダブルクリック防止
    send[0].setAttribute("disabled","");
    //フォーム送信
    document.forms.form1.submit();
  }, false); 

</script>

</body>