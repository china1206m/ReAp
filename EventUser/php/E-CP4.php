<?php
session_cache_limiter("none");
session_start(); // セッション開始

include "MG.php";

$coupon_id = $_SESSION['coupon_id'];

$db = MG_09($coupon_id,"","","","","","");
$coupon = $db->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  include "MD.php";
  $delete = new md();
  $type = [1];
  $delete->md("coupon", "coupon_id", $coupon_id, $type);
  header('Location:E-CP1.html');
  exit;
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-CP4</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="E-CP4.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
  
</head>
<body>

<main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">検索結果</h3>


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
    <button id="open-btn" class="overlay-event" name="coupon_delay" type="button">消去する</button>
    </div>

    <div id="overlay" class="overlay-event">
      <div class="flex">
      <form action="" method="POST" id="form1">
        <div id="overlay-inner">
          <p>クーポンを消去します。</p>
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

  <ul>
        <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CP1.html"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
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