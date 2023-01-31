<?php
session_start(); // セッション開始

include "MG.php";
$event_id = $_SESSION['event_id'];
$db = MG_06($event_id,"","","","","","","","","","","");
$event = $db->fetchAll(PDO::FETCH_ASSOC);

$eventuser_id = $event[0]['eventuser_id']; 
$db = MG_02($eventuser_id,"","","","","","","","","");
$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

//form送信後
//MD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include "MD.php";
  $delete = new md();
  $type = [1];
  $result = $delete->md("event", "event_id", $event_id, $type);
  //完了画面出すなら
    //モジュールでエラーのとき特定の数字を返り値として渡してほしい
    if($result == -1){
      header('Location:E-SE4error.html');
    }else{
      header('Location:E-SE4kanryo.html');
      exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-SE4</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="E-SE4.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
  
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">投稿イベント</h3>
    
<div class="yoko">
  <ul>
  <li><div class="event_information">
    <p class="post_day"><?php print($event[0]['post_date']) ?></p>
    <?php if(!empty($eventuser[0]['profile_message'])) { ?>
      <img src = 'E-ImageUser.php?id=<?= $eventuser[0]['eventuser_id']; ?>' class="circle1" align="left" alt="アイコン">
    <?php } else { ?>
      <!-- デフォルトアイコン -->
      <img src="castle.bmp" class="circle" align="left">
    <?php } ?>
    <div class="title">
      <?php print($event[0]['event_title']) ?>
    </div>

    <br><br>

    <p><?php print($event[0]['event_prefectures']) ?></p>
    <p><?php print($event[0]['event_day_first']) ?>　～　<?php print($event[0]['event_day_end']) ?></p>
    <p><?php print($event[0]['event_place']) ?></p>

    <p><?php print($event[0]['event_content']) ?></p>
    
    
    <center id="image_area">
      <?php if(!empty($event[0]['event_image'])) { ?>
        <img src="E-ImageEvent.php?id=<?= $event[0]['event_id']; ?>" class="img">
     <?php } ?>
    </center>

    <!--費用に関しては必須でないのでデータがない場合には表示されないようになっている。-->
    <p><?php print($event[0]['event_cost']) ?>円</p>

    
  </div></li>
  </ul>

<button id="open-btn" class="overlay-event" type="button">消去する</button>
</div>

<div id="overlay">
  <div class="flex">
    <form action="#" method="POST" id="form1">
    <div id="overlay-inner">
      <p>選択した投稿を消去します。</p>
      <p>本当によろしいですか。</p>
      <!--idはデザイン-->

      <button id="close-btn" class="send-btn" type="button" disabled>はい</button>

      <!--はいを押したら消去機能呼び出し-->
      <button id="close-btn" class="close" type="button" disabled>いいえ</button>
    </div>
    </form>
  </div>
</div>
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
</html>