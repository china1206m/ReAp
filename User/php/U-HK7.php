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

//ログインユーザ情報
$user_id = $_SESSION['user_id'];

// 投稿詳細のユーザ情報
$_SESSION['planuser_id'] = $planuser_id;

//お気に入りテーブルからログインユーザーのお気に入り情報を取ってくる
$db = MG_07("",$user_id,"");
$count2 = $db->rowCount();
$plan_favorite = $db->fetchAll(PDO::FETCH_ASSOC);

//お気に入りされているかの判定

$flag = 0;
for ($i = 0; $i < $count2; $i++) {
  if($plan_favorite[$i]['plan_id'] == $plan_id){
    $flag = 1;
    break;
  }
}

//flagが0の場合お気に入りしていない
//flagが1の場合お気に入り済み


//お気に入り押下処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($flag == 0){
    //お気に入り+1
    $db = getDB();
    $sql = "UPDATE plan SET plan_favorite_total = plan_favorite_total + 1 WHERE plan_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1,$plan_id);
    $stmt->execute();
    //お気に入りに追加
    $db = getDB();
    $sql = "INSERT INTO plan_favorite(user_id,plan_id) VALUES($user_id,$plan_id);";
    $stmt = $db->prepare($sql);
    $stmt->execute();
  } else {
    //お気に入り-1
    $db = getDB();
    $sql = "UPDATE plan SET plan_favorite_total = plan_favorite_total - 1 WHERE plan_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1,$plan_id);
    $stmt->execute(); 
    //お気に入りから削除
    $db = getDB();
    $sql = "DELETE FROM plan_favorite WHERE user_id = ? AND plan_id = ?;";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1,$user_id);
    $stmt->bindValue(2,$plan_id);
    $stmt->execute();
  }
  header('Location:U-HK7.php');
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>U-HK7</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="U-HK7.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
  <button type="button" class="button_back" onclick="history.back()">＜</button>
    <ul id="plan">
      <li class="plan_list">
        <div class="information">
          <p align="right"><?php print($plan[0]['post_date']); ?></p>
          <div class="yoko">
            <a href="U-HK1.php" style="text-decoration:none;">
              <?php if(!empty($planuser[0]['profile_image'])) { ?>
                <img src="U-ImageUser.php?id=<?= $plan[0]['user_id']; ?>" alt="" class="circle1" align="left">
              <?php } else { ?>
                <!-- デフォルトアイコン -->
                <img src="castle.bmp" alt="" class="circle" align="left">
              <?php } ?>
            </a>
            <div class="title"><?php print($plan[0]['plan_title']); ?></div>
          </div>
          <br>
          <br>
          <br>
          <p class="condition"><?php print($plan[0]['plan_prefectures']); ?></p>
          <p class="condition">費用：<?php print($plan[0]['plan_cost']); ?>円</p>
          <p class="condition"><?php print($plan[0]['plan_day']); ?>泊<?php print($plan[0]['plan_day'] + 1); ?>日</p>
          <p class="condition"><?php print($plan[0]['plan_who']); ?></p>
          <ol id="plan-detail"></ol>
        </div>
      </li>
    </ul>
    <form method="POST" action="">
    <div class="favorite">
      <button class="unlike" type="submit"></button><h4 class="num_like"><?php print($plan[0]['plan_favorite_total']); ?></h4>
    </div>
  </form>
    <div class="box"></div>
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
    //var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
    var ol = document.getElementById("plan-detail");
    
    <?php

      for ($i = 0; $i < $count1; $i++) : 

    ?>
//ol内のliの追加
var li_ol = document.createElement('li');

//場所の四角の追加
var div_home = document.createElement('div');
div_home.classList.add("plan_information");

//場所名追加
var p_placename = document.createElement('p');
p_placename.classList.add("plan_content");
p_placename.innerHTML = "<?php print($plan_detail[$i]['plan_place']); ?>"

//本文内容追加
var p_content = document.createElement('p');
p_content.classList.add("plan_content");
p_content.innerHTML = "<?php print($plan_detail[$i]['plan_content']); ?>"

//滞在時間追加
var p_time = document.createElement('p');
p_time.innerHTML = "滞在時間：<?php print($plan_detail[$i]['stay_time_hour']); ?>時間<?php print($plan_detail[$i]['stay_time_minute']); ?>分"
p_time.classList.add("plan_content");

//写真と移動時間の配置
var div_ect = document.createElement('div');
div_ect.classList.add("ect");

//写真追加
<?php if(!empty($plan_detail[$i]['plan_image'])) { ?>
  var pic = document.createElement('img');
  pic.classList.add("pics");
  pic.src = "U-ImagePlan.php?id=<?= $plan_detail[$i]['plan_detail_id']; ?>";
  pic.align = "center"
  pic.alt = ''
<?php } ?>

//移動時間追加
var p_travel = document.createElement('p');
p_travel.classList.add("travel_time");
p_travel.innerHTML = "<?php if($i+1 < $count1){?> 移動時間： <?php print($plan_detail[$i+1]['travel_time_hour']); ?>時間<?php print($plan_detail[$i+1]['travel_time_minute']); ?>分<?php }?>"

ol.appendChild(li_ol);
li_ol.appendChild(div_home);
div_home.appendChild(p_placename);
div_home.appendChild(p_content);
div_home.appendChild(p_time);
li_ol.appendChild(div_ect);
<?php if(!empty($plan_detail[$i]['plan_image'])) { ?>
  div_ect.appendChild(pic);
<?php } ?>
div_ect.appendChild(p_travel);

    <?php endfor; ?>

</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script>
  $('.unlike').on('click', function () {
    $('.unlike').toggleClass('like');
  });
  </script>
</body>