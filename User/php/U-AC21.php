<?php
session_cache_limiter("none");
session_start(); // セッション開始
include "MG.php";

$plan_id = $_SESSION['plan_id'];
$db = MG_04($plan_id,"","","","","","","","","","");
$plan = $db->fetchAll(PDO::FETCH_ASSOC);

$planuser_id = $plan[0]['user_id']; 
//$_SESSION['user_id'] = $user_id; いらない
$db = MG_01($planuser_id,"","","","","","","","","");
$planuser = $db->fetchAll(PDO::FETCH_ASSOC);

$db = getDB();
$sql = "SELECT * FROM plan_detail WHERE plan_id = ? ORDER BY plan_detail_id ASC";
$stmt = $db->prepare($sql);
$stmt->bindValue(1,$plan_id);
$stmt->execute();

$count1 = $stmt->rowCount();

$plan_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 投稿詳細のユーザ情報
$_SESSION['planuser_id'] = $planuser_id;

?>

<!DOCTYPE html>
<html>
<head>
  <title>U-AC21</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="U-AC21.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3><h3 class="button_back"></h3></button>

    

    <div align="right">
        <button type="type" onclick="location.href='U-AC24.php'" class="solid">
            <img src="hensyu.png" alt="編集" width="50" height="50">
        </button>
        <button type="type" onclick="location.href='U-AC18.php'" class="solid">
            <img src="gomibako.png" alt="ゴミ箱" width="50" height="50">
        </button>
    </div>
    

    <ul id="ranking">
      <li class="home-list">
        <div class="ranking_information">
          <div class="yoko">
            <img src="monky.png" class="circle" align="left" alt="アイコン">
            <div class="title"><?php print($plan[0]['plan_title']); ?></div>
          </div><br>
          <p class="condition"><?php print($plan[0]['plan_who']); ?></p>
          <p class="condition"><?php print($plan[0]['plan_cost']); ?>円</p>
          <p class="condition"><?php print($plan[0]['plan_day']); ?>泊<?php print($plan[0]['plan_day'] + 1); ?>日</p>
          <ol id="plan-detail"></ol>
        </div>
      </li>
    </ul>
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
    var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
    var ol = document.getElementById("plan-detail");

    <?php

      for ($i = 0; $i < $count1; $i++) : 

    ?>

        //ol内のliの追加
        var li_ol = document.createElement('li');

        //場所の四角の追加
        var div_home = document.createElement('div');
        div_home.classList.add("home_information");

        //場所名追加
        var p_planname = document.createElement('p');
        p_planname.classList.add("plan_content");
        p_planname.innerHTML = "<?php print($plan_detail[$i]['plan_place']); ?>"

        //本文内容追加
        var p_content = document.createElement('p');
        p_content.classList.add("plan_content");
        p_content.innerHTML = "<?php print($plan_detail[$i]['plan_content']); ?>"

        //滞在時間追加
        var p_time = document.createElement('p');
        p_time.innerHTML = "<?php print($plan_detail[$i]['stay_time_hour']); ?>時間<?php print($plan_detail[$i]['stay_time_minute']); ?>分"
        p_time.classList.add("plan_content");

        //移動時間追加
        var p_travel = document.createElement('p');
        p_travel.classList.add("travel_time");
        p_travel.innerHTML = "<?php if($i+1 < $count1){print($plan_detail[$i+1]['travel_time_hour']); ?>時間<?php print($plan_detail[$i+1]['travel_time_minute']); ?>分<?php }?>"

        ol.appendChild(li_ol);
        li_ol.appendChild(div_home);
        div_home.appendChild(p_planname);
        div_home.appendChild(p_content);
        div_home.appendChild(p_time);
        li_ol.appendChild(p_travel);

        <?php endfor; ?>

</script>
</body>
</html>