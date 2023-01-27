<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-RP2</title>
  <meta charset=”UTF-8″>
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
    for (var count = 0; count < 3; count++) {
      // li要素を作成
      var li = document.createElement('li');
        li.classList.add("box");
  
    var p1 = document.createElement('p');
    p1.innerText = "ユーザID:"

    var p2 = document.createElement('p');
    p2.innerText = "ユーザ名:"

    var p3 = document.createElement('p');
    p3.innerText = "メールアドレス:"
  
    
    
    // それぞれの要素を追加したい場所へ追加
    ul.appendChild(li);
    li.appendChild(p1);
    li.appendChild(p2);
    li.appendChild(p3);
    
  }
  </Script>
  </body>
</html>
