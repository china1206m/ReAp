<?php
session_cache_limiter("none");
session_start(); // セッション開始

if(!isset($_SESSION['user_id'])){
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:U-AC6.php');
  exit;
}

include "MG.php";

$user_id = $_SESSION['planuser_id'];
$db = MG_01($user_id,"","","","","","","","","");
$user = $db->fetchAll(PDO::FETCH_ASSOC);

$db = getDB();
$sql = "SELECT * FROM plan WHERE user_id = ? ORDER BY post_date DESC LIMIT 50";
$stmt = $db->prepare($sql);
$stmt->bindValue(1,$user_id);
$stmt->execute();

$count1 = $stmt->rowCount();

$plan = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $counter = $_POST['counter'];
  $plan_id = $plan[$counter]['plan_id'];
  $_SESSION['plan_id'] = $plan_id;
  header('Location:U-HK7.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-HK1</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="U-HK1.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
  <main id="main">
  <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>
    <form action="" method="POST">
      <input type="hidden" id="counter" name="counter" value="0">
    
  
    <div class="acount_information">
      <div class="yoko">
        <?php if(!empty($user[0]['profile_image'])) { ?>
          <img src="<?php echo $user[0]['profile_image']; ?>" align="left" alt="写真" class="circle1">
        <?php } else { ?>
          <!--デフォルト-->
          <img src="castle.bmp" align="left" alt="写真" class="circle">
        <?php } ?>
    
    
      <div class="user_name">
      <?php print($user[0]['user_name']); ?>
      </div>
    </div>

    <div class="profiel_message">
    <?php print($user[0]['profile_message']); ?>
    </div>
    <button type="button" onclick="location.href='U-HK12.php'" class="report"><img src="U-report.png"></button>
  </div>

    <div class="plan">
      計画ルート
    </div>

    <ul id="self_contribution">
    </ul>

    <div class="box1">
      </div>
  </form>

</main>

<aside id="sub">
  <ul class="menu">
      <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-PL1.html"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-EV2.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-FV2.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
    </ul>
</aside>

<script>
  var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
  var ul = document.getElementById("self_contribution");

    <?php 

      for ($i = 0; $i < $count1; $i++) :  

      $plan_id = $plan[$i]['plan_id']; 
      $db = MG_05("",$plan_id,"","","","","","","");
      $plan_detail = $db->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
      var li = document.createElement('li');
      li.classList.add("list");

      var p = document.createElement('p');

      //ランキング情報のための四角追加
      var div_ranking = document.createElement('div');
      div_ranking.classList.add("all_information");

      //投稿日の追加
      var div_right = document.createElement('div');
      div_right.classList.add("right");
      div_right.innerText = "<?php print($plan[$i]['post_date']); ?>"

      //アイコンと題名の横並びのためのクラス追加
      var div_yoko = document.createElement('div');
      div_yoko.classList.add("yoko");
  
      //題名追加
      var div_title = document.createElement('div');
      div_title.classList.add("title");
      div_title.innerHTML = "<?php print($plan[$i]['plan_title']); ?>";

      var br = document.createElement('br');

      //条件追加
      //都道府県の追加
      var div_pre = document.createElement('p');
      div_pre.classList.add("condition");
      div_pre.innerText = "<?php print($plan[$i]['plan_prefectures']); ?>"
      var p_who = document.createElement('p');
      p_who.classList.add("condition");
      p_who.innerHTML = "<?php print($plan[$i]['plan_who']); ?>"
      var p_cost = document.createElement('p');
      p_cost.classList.add("condition");
      p_cost.innerHTML = "費用：<?php print($plan[$i]['plan_cost']); ?>円"
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
      p_content.innerHTML = `<?php print($plan_detail[0]['plan_content']); ?>`

      //滞在時間追加
      var p_time = document.createElement('p');
      p_time.innerHTML = "滞在時間：<?php print($plan_detail[0]['stay_time_hour']); ?>時間<?php print($plan_detail[0]['stay_time_minute']); ?>分"
      p_time.classList.add("plan_content");

      

      

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
      div_yoko.appendChild(div_title);
      div_ranking.appendChild(br);
      div_ranking.appendChild(br);
      div_ranking.appendChild(div_pre);
      div_ranking.appendChild(p_cost);
      div_ranking.appendChild(p_day);
      div_ranking.appendChild(p_who);
      div_ranking.appendChild(ol);
      ol.appendChild(li_ol);
      li_ol.appendChild(div_home);
      div_home.appendChild(p_planname);
      div_home.appendChild(p_content);
      div_home.appendChild(p_time);
      div_ranking.appendChild(a);
      
    <?php endfor; ?>

  
    function button(clicked_id)
  {
    var s = clicked_id;
    var counter = document.getElementById("counter");
        counter.value = s;
  }

</script>

</body>