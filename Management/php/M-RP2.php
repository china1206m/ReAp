<?php
session_cache_limiter("none");
session_start(); // セッション開始

if(!isset($_SESSION['administrator_id'])){
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:M-AC1.php');
  exit;
}

include "MG.php";

$db = MG_08("","","");
$count1 = $db->rowCount();
$user_report = $db->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-RP2</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="M-RP2.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <form action='' method="POST" enctype="multipart/form-data">
    
    <div>
      <ul id="country_list">
          
      </ul>
    
    
      <div class="right"> 
                <button type="button" onclick="location.href='M-SC1.php'"><img src="serch_image.png"  height ="40" width="40"/></button>
      </div>
    </div>

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

    <li class="menu-list"><button type="button" class="menu-logout" onclick=location.href="M-AC2.php">ログアウト</a></li><br>
  </ul>
</aside>

<script>

                


    // 四角の数を動的に変化
    //文字列はphpで作成しそれを引っ張ってくる
    var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
  
    var ul = document.getElementById("country_list");
    <?php
      for ($i = 0; $i < $count1; $i++) :  

        $user_id = $user_report[$i]['user_id']; 
        $db = MG_01($user_id,"","","","","","","","","");
        $user = $db->fetchAll(PDO::FETCH_ASSOC);
    ?>
      // li要素を作成
      var li = document.createElement('li');
        li.classList.add("box");
  
    var p1 = document.createElement('p');
    p1.innerText = "ユーザID:<?php print($user[0]['user_id']) ?>"

    var p2 = document.createElement('p');
    p2.innerText = "ユーザ名:<?php print($user[0]['user_name']) ?>"

    var p3 = document.createElement('p');
    p3.innerText = "メールアドレス:<?php print($user[0]['user_mail']) ?>"

    var p4 = document.createElement('p');
    p4.innerText = "通報内容:<?php print($user_report[$i]['report_content']) ?>"
  
    
    
    // それぞれの要素を追加したい場所へ追加
    ul.appendChild(li);
    li.appendChild(p1);
    li.appendChild(p2);
    li.appendChild(p3);
    li.appendChild(p4);

        <?php endfor; ?>

  </Script>
  </body>
</html>
