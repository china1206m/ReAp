<?php

include "MG.php";

$plan_search = "";
$plan_who = "";
$plan_prefectures = "";
$plan_cost = "";
$plan_date_first = "";
$plan_date_end = "";
$plan_day = "";

$db = MG_12($plan_search,$plan_who,$plan_prefectures,$plan_cost,$plan_date_first,$plan_date_end,$plan_day);

$count1 = $db->rowCount();

$plan = $db->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
  <head>
    <title>M-SC3</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="M-SC3.css" type="text/css">
    <link rel="stylesheet" href="M-menu.css" type="text/css">
  </head>
  <body>
    <main id="main">
      <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button>
      <ul id="planlist">
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

    <li class="menu-list"><button type="button" class="menu-logout" onclick=location.href="M-AC2.php">ログアウト</a></li><br>
  </ul>
</aside>

    <script>
      // var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
      var ul = document.getElementById("planlist");
      <?php 

        for ($i = 0; $i < $count1; $i++) :  

          $user_id = $plan[$i]['user_id']; 
          $db = MG_01($user_id,"","","","","","","","");
          $user = $db->fetchAll(PDO::FETCH_ASSOC);

          $plan_id = $plan[$i]['plan_id']; 
          $db = MG_05("",$plan_id,"","","","","","","");
          $plan_detail = $db->fetchAll(PDO::FETCH_ASSOC);
      ?>
      var li = document.createElement('li');
      li.classList.add("home-list");

      var p = document.createElement('p');

      //ランキング情報のための四角追加
      var div_planlist = document.createElement('div');
      div_planlist.classList.add("planlist_information");

      //投稿日の追加
      var div_right = document.createElement('div');
      div_right.classList.add("right");
      div_right.innerText = "<?php print($plan[$i]['post_date']); ?>"

      //アイコンと題名の横並びのためのクラス追加
      var div_yoko = document.createElement('div');
      div_yoko.classList.add("yoko");

      //アイコン追加
      var img = document.createElement('img');
      img.classList.add("circle");
      img.src = 'monky.png';
      img.align = 'left'
      img.alt = '<?php print($user[0]['user_name']); ?>'
        
      //題名追加
      var div_title = document.createElement('div');
      div_title.classList.add("title");
      div_title.innerHTML = "<?php print($plan[$i]['plan_title']); ?>";

      var br = document.createElement('br');

      //都道府県の追加
      var p_pre = document.createElement('p');
      p_pre.classList.add("condition");
      p_pre.innerText = "<?php print($plan[$i]['plan_prefectures']); ?>"

      //条件追加
      var p_who = document.createElement('p');
      p_who.classList.add("condition");
      p_who.innerHTML = "<?php print($plan[$i]['plan_who']); ?>"
      var p_cost = document.createElement('p');
      p_cost.classList.add("condition");
      p_cost.innerHTML = "<?php print($plan[$i]['plan_cost']); ?>円"
      var p_day = document.createElement('p');
      p_day.classList.add("condition");
      p_day.innerHTML = "<?php print($plan[$i]['plan_day']); ?>泊<?php print($plan[$i]['plan_day'] + 1); ?>日"

      //olの追加
      var ol = document.createElement('ol');

      //ol内のliの追加
      var li_ol = document.createElement('li');

      //場所の四角の追加
      var div_home = document.createElement('div');
      div_home.classList.add("home_information");

      //場所名追加
      var p_planname = document.createElement('p');
      p_planname.classList.add("plan_content");
      p_planname.innerHTML = "<?php print($plan_detail[0]['plan_place']); ?>"

      //本文内容追加
      var p_content = document.createElement('p');
      p_content.classList.add("plan_content");
      p_content.innerHTML = "<?php print($plan_detail[0]['plan_content']); ?>"

      //滞在時間追加
      var p_time = document.createElement('p');
      p_time.innerHTML = "<?php print($plan_detail[0]['stay_time_hour']); ?>時間<?php print($plan_detail[0]['stay_time_minute']); ?>分"
      p_time.classList.add("plan_content");

      //移動時間追加
      var p_travel = document.createElement('p');
      p_travel.classList.add("travel_time");
      p_travel.innerHTML = "<?php print($plan_detail[0]['travel_time_minute']); ?>時間<?php print($plan_detail[0]['travel_time_minute']); ?>分"

      // もっと見るを作成
      var a = document.createElement('a');
      a.classList.add("more-see");
      a.href = "U-HK7.php";
      a.innerText = "...もっと見る";

      ul.appendChild(li);
      li.appendChild(div_planlist);
      div_planlist.appendChild(div_right);
      div_planlist.appendChild(div_yoko);
      div_yoko.appendChild(img);
      div_yoko.appendChild(div_title);
      div_planlist.appendChild(br);
      div_planlist.appendChild(br);
      div_planlist.appendChild(p_pre);
      div_planlist.appendChild(p_who);
      div_planlist.appendChild(p_cost);
      div_planlist.appendChild(p_day);
      div_planlist.appendChild(ol);
      ol.appendChild(li_ol);
      li_ol.appendChild(div_home);
      div_home.appendChild(p_planname);
      div_home.appendChild(p_content);
      div_home.appendChild(p_time);
      div_planlist.appendChild(p_travel);
      div_planlist.appendChild(a);

        <?php endfor; ?>

    </script>
  </body>
</html>