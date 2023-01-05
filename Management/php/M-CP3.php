<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-CP3</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="M-CP3.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body>

<main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">検索結果</h3>

    
<div class="yoko-narabi">
<form action="E-AC4.php" method="post">
    <ul id="coupon_list1">
        
    </ul>
</form> 
<form action="E-AC4.php" method="post">
    <ul id="coupon_list2">
        
    </ul>
</form>
</div>

 </main>

<aside id="sub">
    <ul>
        <li class="menu-list"><a class="menu-button" href="M-HK1.php.html"><img src="M-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-PL1.php"><img src="M-menu-place.png" width="45" height="43">　名所</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-EV1.php"><img src="M-menu-event.png" width="45" height="43">　イベント</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-RP1.php"><img src="M-menu-report.png" width="45" height="43">　通報一覧</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-CP1.php"><img src="M-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-UM1.php"><img src="M-menu-acount.png" width="45" height="43">　ユーザ管理</a></li><br>
    </ul>
</aside>

<script>
    // phpで文字列に改行を入れて作成する　下のcountry,shopはphpで作成するもの
  var country = ['店名１', '店名２', '店名３', '店名４', '店名５'];
  var shop = ['内容１', '内容２', '内容３', '内容４', '内容５'];

var ul1 = document.getElementById("coupon_list1");
for (var count = 0; count < 3; count=count+2) {
    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('button');
    button1.classList.add("box1");

    // テキスト情報を作成
    var text = document.createTextNode(country[count]);
    var br = document.createElement('br');
    var shopname = document.createTextNode(shop[count]);

    // ul要素に追加
    li1.appendChild(button1);
    button1.appendChild(text);
    button1.appendChild(br);
    button1.appendChild(shopname);
    ul1.appendChild(li1);
}

var ul2 = document.getElementById("coupon_list2");
for (var count = 1; count < 3; count=count+2) {
    // li要素を作成
    var li2 = document.createElement('li');

    var button2 = document.createElement('button');
    button2.classList.add("box2");

    // テキスト情報を作成
    var text = document.createTextNode(country[count]);
    var br = document.createElement('br');
    var shopname = document.createTextNode(shop[count]);

    // ul要素に追加
    li2.appendChild(button2);
    button2.appendChild(text);
    button2.appendChild(br);
    button2.appendChild(shopname);
    ul2.appendChild(li2);
}


  // -->

</script>
</body>
</html>
