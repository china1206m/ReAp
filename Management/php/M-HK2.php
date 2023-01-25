<?php

include "MG.php";

$id = 1;
$db = MG_04($id,"","","","","","","","","","");
$plan = $db->fetchAll(PDO::FETCH_ASSOC);

$user_id = $plan[0]['user_id']; 
$db = MG_01($user_id,"","","","","","","","");
$user = $db->fetchAll(PDO::FETCH_ASSOC);

$db = getDB();
$sql = "SELECT * FROM plan_detail WHERE plan_id = ? ORDER BY plan_detail_id ASC";
$stmt = $db->prepare($sql);
$stmt->bindValue(1,$id);
$stmt->execute();

$count1 = $stmt->rowCount();

$plan_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>M-HK2</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="M-HK2.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back"></h3>
    <ul id="ranking">
      <li class="home-list">
        <div class="ranking_information">
          <p align="right"><?php print($plan[0]['post_date']); ?></p>
          <div class="yoko">
            <img src="monky.png" class="circle" align="left" alt="アイコン">
            <div class="title"><?php print($plan[0]['plan_title']); ?></div>
          </div><br>
          <p class="condition"><?php print($plan[0]['plan_prefectures']); ?></p>
          <p class="condition"><?php print($plan[0]['plan_who']); ?></p>
          <p class="condition"><?php print($plan[0]['plan_cost']); ?>円</p>
          <p class="condition"><?php print($plan[0]['plan_day']); ?>泊<?php print($plan[0]['plan_day'] + 1); ?>日</p>
          <ol id="plan-detail"></ol>
        </div>
        <p align="right" class="favorite">お気に入り数</p>
      </li>
    </ul>
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
        p_travel.innerHTML = "<?php print($plan_detail[$i]['travel_time_hour']); ?>時間<?php print($plan_detail[$i]['travel_time_minute']); ?>分"

        ol.appendChild(li_ol);
        li_ol.appendChild(div_home);
        div_home.appendChild(p_planname);
        div_home.appendChild(p_content);
        div_home.appendChild(p_time);
        li_ol.appendChild(p_travel);

        <?php endfor; ?>

</script>
</body>