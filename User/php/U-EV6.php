<?php 
session_cache_limiter("none");
session_start(); // セッション開始

if(!isset($_SESSION['user_id'])){
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:U-AC6.php');
  exit;
}


include "MG.php";

$event_search = $_SESSION['event_search'];
$event_prefectures = $_SESSION['event_prefectures'];
$event_day_first = $_SESSION['event_day_first'];
$event_day_end = $_SESSION['event_day_end'];
$event_cost = $_SESSION['event_cost'];

$db = MG_11("",$event_search,$event_prefectures,$event_day_first,$event_day_end,$event_cost);

$count1 = $db->rowCount();

$event = $db->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $counter = $_POST['counter'];
  $event_id = $event[$counter]['event_id'];
  $_SESSION['event_id'] = $event_id;
  header('Location:U-EV2.php');
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>U-EV6</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="U-EV6.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
  <main id="main">
  <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>
    <form action="" method="POST">
    <input type="hidden" id="counter" name="counter" value="0">
    <!--phpの検索結果がないときのひょうじはここ-->
    <h4 align="center">
      <?php 
        if($count1 == 0) {
          $str = '検索条件に該当するものはありません。';
          echo $str;
        }
      ?>
    </h4>
    <ul id="self_contribution">
    </ul>
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
    var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
    var ul = document.getElementById("self_contribution");
    
    <?php

      for ($i = 0; $i < $count1; $i++) :

        $eventuser_id = $event[$i]['eventuser_id'];
        $db = MG_02($eventuser_id,"","","","","","","","","");
        $eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

    ?>
  var li = document.createElement('li');
        li.classList.add("list");
  
        //ランキング情報のための四角追加
        var div_eventlist = document.createElement('div');
        div_eventlist.classList.add("all_information");

        //投稿日の追加
      var div_right = document.createElement('div');
      div_right.classList.add("right");
      div_right.innerText = "<?php print($event[$i]['post_date']); ?>"

        // ユーザアイコン
        <?php if(!empty($eventuser[0]['profile_image'])) { ?>
          var img = document.createElement('img');
          img.classList.add("circle1");
          img.src = '<?php echo '../EventUser/'.$eventuser[0]['profile_image']; ?>';
          img.align = 'left'
          img.alt = 'username'
        <?php } else { ?>
          // デフォルトアイコン
        var img1 = document.createElement('img');
        img1.classList.add("circle");
        img1.src = 'castle.bmp';
        img1.align = 'left'
        img1.alt = 'なし'
        <?php } ?>
        //アイコンと題名の横並びのためのクラス追加
        var div_yoko = document.createElement('div');
        div_yoko.classList.add("yoko");
        
        //題名追加
        var div_title = document.createElement('div');
        div_title.classList.add("title");
        div_title.innerHTML = "<?php print($event[$i]['event_title']); ?>";
  
        var br = document.createElement('br');

        //都道府県の追加
      var p_pre = document.createElement('p');
      p_pre.classList.add("pref");
      p_pre.innerText = "<?php print($event[$i]['event_prefectures']); ?>"
  
        //内容追加
        var p = document.createElement('p');
        p.classList.add("content");
        p.innerHTML = `<?php print($event[$i]['event_content']); ?>`

        var a = document.createElement('button');
        a.type="submit";
        a.classList.add("more-see");
        a.setAttribute('name','more_see' + <?php print($i); ?>);
        a.setAttribute('id', <?php print($i); ?>);
        a.setAttribute('onclick','button(this.id)');
        a.innerText = "...もっと見る";
  
        ul.appendChild(li);
        li.appendChild(div_eventlist);
        div_eventlist.appendChild(div_right);
        div_eventlist.appendChild(div_yoko);
        <?php if(!empty($eventuser[0]['profile_image'])) { ?>
          div_yoko.appendChild(img);
        <?php } else { ?>
        //デフォルトアイコン
         div_yoko.appendChild(img1);
        //ここまで
        <?php } ?>
        div_yoko.appendChild(div_title);
        div_eventlist.appendChild(br);
        div_eventlist.appendChild(br);
        div_eventlist.appendChild(p_pre);
        div_eventlist.appendChild(p);
        div_eventlist.appendChild(a);
        
    
        <?php endfor; ?>

        function button(clicked_id){
          var s = clicked_id;
          var counter = document.getElementById("counter");
          counter.value = s;
        }

  </script>
</body>
</html>