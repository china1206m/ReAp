<?php

include "MG.php";

$id = "1";

$db = MG_09($id,"","","","","","");
$coupon = $db->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC15</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "U-AC15.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>

    <body>
    <main id="main">
    <form action='' method="POST" enctype="multipart/form-data">
        <button type="submit" class="button_back" onclick="history.back()"><h3>＜</h3></button>
            
        <div align="center">

            <font size="+4">
                クーポン使用
            </font>

            <ul id="coupon_list1">
                <li>
                    
            </ul>
                    
        </div>
        
            <div align="center" class="k2">
                <button id="open-btn" class="overlay-event" type="submit">
                    消去
                </button>
            </div>

            <span id="overlay" class="overlay-event">
              <span class="flex">
                <span id="overlay-inner">
                    <p>上記のクーポンを消去します。<br>
                      <font color = "red">
                          本当によろしいですか？
                      </font><br>
                    </p>
                    <div>
                        <button onclick="disp()" id="close-btn" type="submit" href = "U-AC14.html">
                            はい
                        </button>
                        <button id="close-btn"  class="overlay-event" type="submit" href = "U-AC15.html">
                            いいえ
                        </button>
                    </div>
                  
                </span>
              </span>
            </span>
    </form>
    </main>

    <aside id="sub">
        <ul class="menu">
            <li class="menu-list"><a class="menu-button" href="U-HK1.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-PL1.php"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-FV1.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
          </ul>
      </aside>
            
    
    <script>
                document.addEventListener('DOMContentLoaded', function(){
    
    // オーバレイを開閉する関数
    const overlay = document.getElementById('overlay');
    function overlayToggle() {
      overlay.classList.toggle('overlay-on');
    }
    // 指定した要素に対して上記関数を実行するクリックイベントを設定
    const clickArea = document.getElementsByClassName('overlay-event');
    for(let i = 0; i < clickArea.length; i++) {
      clickArea[i].addEventListener('click', overlayToggle, false);
    }
    
    // イベントに対してバブリングを停止
    function stopEvent(event) {
      event.stopPropagation();
    }
    const overlayInner = document.getElementById('overlay-inner');
    overlayInner.addEventListener('click', stopEvent, false);
    
  }, false);

  n=2;
function disp() {
    if(n == 1){
        document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>完了しました</span>";
    }else if(n == 2){
        document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>エラーです</span>";
    }
}


 
var n=8;
    // phpで文字列に改行を入れて作成する　下のcountry,shopはphpで作成するもの
  //var day = ['期限１', '期限２', '期限３', '期限４', '期限５'];
  //var shop = ['店名１', '店名２', '店名３', '店名４', '店名５'];
  //var content = ['内容１', '内容２', '内容３', '内容４', '内容５'];

var ul1 = document.getElementById("coupon_list1");
    // li要素を作成
    var li1 = document.createElement('li');

    var label = document.createElement('label');
    label.classList.add("coupon");

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
    var shopname = document.createTextNode("<?php print($coupon[0]['coupon_place']) ?>");
    var date = document.createTextNode("<?php print($coupon[0]['coupon_deadline']) ?>");
    var cont = document.createTextNode("<?php print($coupon[0]['coupon_content']) ?>");
    var br1 = document.createElement('br');
    var br2 = document.createElement('br');
    var br3 = document.createElement('br');
    

    // ul要素に追加
    ul1.appendChild(li1);
    li1.appendChild(label);
    label.appendChild(div_left);
    div_left.appendChild(div_shop);
    div_shop.appendChild(shopname);
    div_left.appendChild(div_price);
    div_price.appendChild(br1);
    div_price.appendChild(br2);
    div_price.appendChild(cont);
    label.appendChild(div_right);
    div_right.appendChild(div_date);
    div_date.appendChild(br3);
    div_date.appendChild(date);
            

    </script>
        
        
    </body>
</html>