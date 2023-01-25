<?php

include "MG.php";

$event_id = 2;
$db = MG_06($event_id,"","","","","","","","","","","");
$event = $db->fetchAll(PDO::FETCH_ASSOC);

$eventuser_id = $event[0]['eventuser_id'];
$db = MG_02($eventuser_id,"","","","","","","","","");
$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-EV2</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="M-EV2.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
    
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3><h3 class="button_back"></h3></button>
    
      <div class="right"> 
                <button type="button" onclick="location.href='M-SC2.php'"><img src="serch_image.png"  height ="40" width="40"/></button>
      </div>

      <ul id="ranking">
      <li class="home-list">
        <div class="ranking_information">
          <div class="yoko">
            <img src="monky.png" class="circle" align="left" alt="アイコン">
            <div class="title">題名</div>
          </div><br>
          <p class="condition">誰と</p>
          <p class="condition">費用</p>
          <p class="condition">何泊何日</p>
          <ol id="plan-detail"></ol>
        </div>
      </li>
    </ul>

</form>
    
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

                


  // 四角の数を動的に変化
  //文字列はphpで作成しそれを引っ張ってくる
  //var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];

  var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
    var ol = document.getElementById("plan-detail");
    for (var count = 0; count < 4; count++) {
        //ol内のliの追加
        var li_ol = document.createElement('li');

        //場所の四角の追加
        var div_home = document.createElement('div');
        div_home.classList.add("home_information");

        //場所名追加
        var p_planname = document.createElement('p');
        p_planname.classList.add("plan_content");
        p_planname.innerHTML = "場所名"

  // 本文を作成
  var p = document.createElement('p');
  p.classList.add("limit");
  var text = document.createTextNode("<?php print($event[0]['event_content']); ?>");
  p.appendChild(text);

  //滞在時間追加
  var p_time = document.createElement('p');
        p_time.innerHTML = "滞在時間"
        p_time.classList.add("plan_content");

        //移動時間追加
        var p_travel = document.createElement('p');
        p_travel.classList.add("travel_time");
        p_travel.innerHTML = "移動時間"

  
  // それぞれの要素を追加したい場所へ追加
  ol.appendChild(li_ol);
        li_ol.appendChild(div_home);
        div_home.appendChild(p_planname);
        div_home.appendChild(p_content);
        div_home.appendChild(p_time);
        li_ol.appendChild(p_travel);
}

</Script>
</body>