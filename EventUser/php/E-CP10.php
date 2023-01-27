<?php
session_cache_limiter("none");
session_start(); // セッション開始

include "MG.php";

$eventuser_id = $_SESSION['eventuser_id'];

$db = MG_09("","",$eventuser_id,"","","","");
$count1 = $db->rowCount();
$coupon = $db->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $counter = $_POST['counter'];
    $event_id = $coupon[$counter]['coupon_id'];
    $_SESSION['coupon_id'] = $event_id;
    header('Location:E-CP4.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-CP10</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="E-CP10.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body>

<main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">クーポン一覧</h3>
    <form action="" method="POST">
    <input type="hidden" id="counter" name="counter" value="0">
    
<div class="yoko-narabi">

    <ul id="coupon_list1">
            
    </ul>
 

    <ul id="coupon_list2">
        
    </ul>

</div>
</form>
</main>

<aside id="sub">
    <ul>
            <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
            <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
            <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
            <li class="menu-list"><a class="menu-button" href="E-CP1.html"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
            <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
      </ul>
</aside>

<script>
    var ul1 = document.getElementById("coupon_list1");

    <?php for ($i = 0; $i < $count1; $i=$i + 2) : ?>

    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('button');
    button1.classList.add("coupon");
    button1.setAttribute('id', <?php print($i); ?>);
    button1.setAttribute('onclick','button(this.id)');

    var div_left = document.createElement('div');
    div_left.classList.add("left");

    var div_shop = document.createElement('div');
    div_shop.classList.add("shop");

    var div_price = document.createElement('div');
    div_price.classList.add("price");

    var div_right = document.createElement('div');
    div_right.classList.add("right");

    var div_date = document.createElement('div');
    div_date.classList.add("date");
    div_date.innerText = "有効期限";


    // テキスト情報を作成
    var shopname = document.createTextNode("<?php print($coupon[$i]['coupon_place']); ?>");
    var date = document.createTextNode("<?php print($coupon[$i]['coupon_deadline']); ?>");
    var cont = document.createTextNode("<?php print($coupon[$i]['coupon_name']); ?>");
    var br1 = document.createElement('br');
    var br2 = document.createElement('br');
    var br3 = document.createElement('br');
    

    // ul要素に追加
    ul1.appendChild(li1);
    li1.appendChild(button1);
    button1.appendChild(div_left);
    div_left.appendChild(div_shop);
    div_shop.appendChild(shopname);
    div_left.appendChild(div_price);
    div_price.appendChild(br1);
    div_price.appendChild(br2);
    div_price.appendChild(cont);
    button1.appendChild(div_right);
    div_right.appendChild(div_date);
    div_date.appendChild(br3);
    div_date.appendChild(date);
   
    <?php endfor; ?>

var ul2 = document.getElementById("coupon_list2");

    <?php 

        for ($i = 1; $i < $count1; $i=$i + 2) :

    ?>

  

    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('button');
    button1.classList.add("coupon");
    button1.setAttribute('id', <?php print($i); ?>);
    button1.setAttribute('onclick','button(this.id)');

    var div_left = document.createElement('div');
    div_left.classList.add("left");

    var div_shop = document.createElement('div');
    div_shop.classList.add("shop");

    var div_price = document.createElement('div');
    div_price.classList.add("price");

    var div_right = document.createElement('div');
    div_right.classList.add("right");

    var div_date = document.createElement('div');
    div_date.classList.add("date");
    div_date.innerText = "有効期限";


    // テキスト情報を作成
    var shopname = document.createTextNode("<?php print($coupon[$i]['coupon_place']); ?>");
    var date = document.createTextNode("<?php print($coupon[$i]['coupon_deadline']); ?>");
    var cont = document.createTextNode("<?php print($coupon[$i]['coupon_name']); ?>");
    var br1 = document.createElement('br');
    var br2 = document.createElement('br');
    var br3 = document.createElement('br');
    

    // ul要素に追加
    ul2.appendChild(li1);
    li1.appendChild(button1);
    button1.appendChild(div_left);
    div_left.appendChild(div_shop);
    div_shop.appendChild(shopname);
    div_left.appendChild(div_price);
    div_price.appendChild(br1);
    div_price.appendChild(br2);
    div_price.appendChild(cont);
    button1.appendChild(div_right);
    div_right.appendChild(div_date);
    div_date.appendChild(br3);
    div_date.appendChild(date);

    <?php endfor; ?>

    function button(clicked_id){
        var s = clicked_id;
        var counter = document.getElementById("counter");
        counter.value = s;
    }
</script>

</body>
</html>
