<?php
session_cache_limiter("none");
session_start(); // セッション開始

include "MG.php";

$id = $_SESSION['user_id'];

$db = getDB();
$sql = "SELECT * FROM plan_favorite WHERE user_id = ? ORDER BY plan_favorite_id DESC LIMIT 50";
$stmt = $db->prepare($sql);
$stmt->bindValue(1,$id);
$stmt->execute();

$count1 = $stmt->rowCount();

$plan_favorite = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $counter = $_POST['counter'];
  $plan_id = $plan_favorite[$counter]['plan_id']; 
  $_SESSION['plan_id'] = $plan_id;
  header('Location:U-HK7.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>U-FV2</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="U-FV2.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <form action="" method="POST" name="searchForm" onSubmit="return check();">
    <input type="hidden" id="counter" name="counter" value="0">
    <h4 align="center">
      <?php 
        if($count1 == 0) {
          $str = 'お気に入りされている投稿はありません';
          echo $str;
        }
      ?>
    </h4>

    <ul id="ranking">
    </ul>
  </form>
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
    var ul = document.getElementById("ranking");

    <?php 

      for ($i = 0; $i < $count1; $i++) :  

      $plan_id = $plan_favorite[$i]['plan_id']; 
      $db = MG_04($plan_id,"","","","","","","","","","");
      $plan = $db->fetchAll(PDO::FETCH_ASSOC);

      $db = MG_05("",$plan_id,"","","","","","","");
      $plan_detail = $db->fetchAll(PDO::FETCH_ASSOC);
    ?>

        var li = document.createElement('li');
        li.classList.add("home-list");

        var p = document.createElement('p');

        //ランキング情報のための四角追加
        var div_ranking = document.createElement('div');
        div_ranking.classList.add("ranking_information");

        //投稿日の追加
      var div_right = document.createElement('div');
      div_right.classList.add("right");
      div_right.innerText = "<?php print($plan[0]['post_date']); ?>"

        //アイコンと題名の横並びのためのクラス追加
        var div_yoko = document.createElement('div');
        div_yoko.classList.add("yoko");

        //アイコン追加
        var img = document.createElement('img');
        img.classList.add("circle");
        img.src = 'monky.png';
        img.align = 'left'
        img.alt = 'アイコン'
        
        //題名追加
        var div_title = document.createElement('div');
        div_title.classList.add("title");
        div_title.innerHTML = "<?php print($plan[0]['plan_title']); ?>";

        var br = document.createElement('br');

        //条件追加
        var p_who = document.createElement('p');
        p_who.classList.add("condition");
        p_who.innerHTML = "<?php print($plan[0]['plan_who']); ?>"
        var p_cost = document.createElement('p');
        p_cost.classList.add("condition");
        p_cost.innerHTML = "<?php print($plan[0]['plan_cost']); ?>円"
        var p_day = document.createElement('p');
        p_day.classList.add("condition");
        p_day.innerHTML = "<?php print($plan[0]['plan_day']); ?>泊<?php print($plan[0]['plan_day'] + 1); ?>日"
        var p_prefectures = document.createElement('p');
        p_prefectures.classList.add("condition");
        p_prefectures.innerHTML = "<?php print($plan[0]['plan_prefectures']); ?>"

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
        p_travel.innerHTML = ""

        // もっと見るを作成
        var a = document.createElement('button');
        a.type="submit";
        a.classList.add("more-see");
        a.setAttribute('name','more_see' + <?php print($i); ?>);
        a.setAttribute('id', <?php print($i); ?>);
        a.setAttribute('onclick','button(this.id)');
        a.innerText = "...もっと見る";



        ul.appendChild(li);
        li.appendChild(p);
        li.appendChild(div_ranking);
        div_ranking.appendChild(div_right);
        div_ranking.appendChild(div_yoko);
        div_yoko.appendChild(img);
        div_yoko.appendChild(div_title); 
        div_ranking.appendChild(br);
        div_ranking.appendChild(br);
        div_ranking.appendChild(p_prefectures);
        div_ranking.appendChild(p_who);
        div_ranking.appendChild(p_cost);
        div_ranking.appendChild(p_day);
        div_ranking.appendChild(ol);
        ol.appendChild(li_ol);
        li_ol.appendChild(div_home);
        div_home.appendChild(p_planname);
        div_home.appendChild(p_content);
        div_home.appendChild(p_time);
        div_ranking.appendChild(p_travel);
        div_ranking.appendChild(a);

        <?php endfor; ?>

        function button(clicked_id){
          var s = clicked_id;
          var counter = document.getElementById("counter");
          counter.value = s;
        }

</script>
</body>