<?php

include "MG.php";

$db = getDB();
$sql = "SELECT * FROM event ORDER BY post_date DESC LIMIT 50";
$stmt = $db->prepare($sql);
$stmt->execute();

$count1 = $stmt->rowCount();

$event = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>U-EV1</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="U-EV1.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <div align="right">
      <button class="btn" onclick="location.href='U-EV4.php'"><img src="search.png"></button>
    </div>
    <ul id="event-list">
    </ul>
  </main>

  <aside id="sub">
    <ul class="menu">
        <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-PL1.php"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-FV1.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
      </ul>
  </aside>

  <script>
    var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
    var ul = document.getElementById("event-list");
    <?php 

       for ($i = 0; $i < $count1; $i++) :  

        $eventuser_id = $event[$i]['eventuser_id']; 
        $db = MG_02($eventuser_id,"","","","","","","","","");
        $eventuser = $db->fetchAll(PDO::FETCH_ASSOC); 
    ?>
      var li = document.createElement('li');
        li.classList.add("event_list");
  
        //イベント情報のための四角追加
        var div_eventlist = document.createElement('div');
        div_eventlist.classList.add("all_information");

        //投稿日の追加
      var div_right = document.createElement('div');
      div_right.classList.add("right");
      div_right.innerText = "<?php print($event[$i]['post_date']); ?>"

        //アイコン追加
        var img = document.createElement('img');
        img.classList.add("circle");
        img.src = 'monky.png';
        img.align = 'left'
        img.alt = '<?php print($eventuser[0]['eventuser_name']) ?>'
  
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
  
        //イベント内容追加
        var p = document.createElement('p');
        p.classList.add("content");
        p.innerHTML = "<?php print($event[$i]['event_content']); ?>"

        // もっと見るを作成
        var a = document.createElement('a');
        a.classList.add("more-see");
        a.href = "U-EV2.php";
        a.innerText = "...もっと見る";
  
        ul.appendChild(li);
        li.appendChild(div_eventlist);
        div_eventlist.appendChild(div_right);
        div_eventlist.appendChild(div_yoko);
        div_yoko.appendChild(img);
        div_yoko.appendChild(div_title);
        div_eventlist.appendChild(br);
        div_eventlist.appendChild(br);
        div_eventlist.appendChild(p_pre);
        div_eventlist.appendChild(p);
        div_eventlist.appendChild(a);
        
        <?php endfor; ?>

  </script>
</body>
</html>