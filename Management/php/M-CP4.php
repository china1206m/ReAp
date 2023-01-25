<?php

include "MG.php";

$id = 2;

$db = MG_09($id,"","","","","","");
$coupon = $db->fetchAll(PDO::FETCH_ASSOC);

//form送信後
//MD
//完了画面出すなら
    //モジュールでエラーのとき特定の数字を返り値として渡してほしい
    $result = ;
    if($result==-1){
      //error
      header('');
    }else{
      //正常時処理 完了画面
    }
?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-CP4</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="M-CP4.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
  
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
    <button id="open-btn" name="coupon_delay" type="button" onClick="check()">消去する</button>
    </div>

    <div id="overlay" class="overlay-event">
      <div class="flex">
      <form action="#" method="POST">
        <div id="overlay-inner">
          <p>クーポンを消去します。</p>
          <p>本当によろしいですか。</p>
          <!--idはデザイン-->
          <button id="close-btn1" class="close" disabled>はい</button>
          <!--はいを押したら消去機能呼び出し-->
          <button id="close-btn2" class="close" type=button disabled>いいえ</button>
        </div>
      </form>
      </div>
    </div>
    </center>



</main>

<aside id="sub">

    <ul>
    <li class="menu-list"><a class="menu-button" href="M-HK1.php"><img src="M-menu-home.png" width="45" height="43">　ホーム</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-PL1.html"><img src="M-menu-place.png" width="45" height="43">　名所</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-EV1.php"><img src="M-menu-event.png" width="45" height="43">　イベント</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-RP2.php"><img src="M-menu-report.png" width="45" height="43">　通報一覧</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-CP1.html"><img src="M-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-UM1.php"><img src="M-menu-acount.png" width="45" height="43">　ユーザ管理</a></li><br>

    <li class="menu-list"><button class="menu-logout" href="M-AC2.php">ログアウト</a></li><br>
    </ul>
</aside>



<script>
  var open = document.getElementById("open-btn");
  var close1 = document.getElementById("close-btn1");
  var close2 = document.getElementById("close-btn2");
  //オーバーレイ開閉の関数
  const overlay = document.getElementById('overlay');
  function overlayToggle() {
    overlay.classList.toggle('overlay-on');
  }

  function check(){
    overlayToggle();
    open.setAttribute("disabled","");
    close1.removeAttribute("disabled");
    close2.removeAttribute("disabled");
   
  }

  //'いいえ'が押されたとき
  close2.addEventListener('click', function(){
    // ダブルクリック防止
    close2.setAttribute("disabled","");
    open.removeAttribute("disabled");
    //オーバーレイ閉じる
    overlayToggle();
  }, false);

  //'はい'が押されたとき
  close.addEventListener('click', function(){
    // ダブルクリック防止
    close.setAttribute("disabled","");
  }, false);
</script>

</body>