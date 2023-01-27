<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC11</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "U-AC11.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>

    <body>
    <main id="main">
        <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button>
       
        <form action='' method="POST" enctype="multipart/form-data" id="form1">
        <div align="center">

            <font size="+4">
                クーポン一覧
            </font>


            <ul id="coupon_list">
                
            </ul>
                    
        </div>
    </form>
        
            

            <span id="overlay">
              <span class="flex">
                <span id="overlay-inner">
                    <p>上記のクーポンを取得します。<br>
                      <font color = "red">
                          本当によろしいですか？
                      </font><br>
                    </p>
                    <div>
                        <button id="close-btn1" class="close" disabled>
                            はい
                        </button>
                        <button id="close-btn2" class="close" type="button" disabled>
                            いいえ
                        </button>
                    </div>
                  
                </span>
              </span>
            </span>
        
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
  
var n=8;
    // phpで文字列に改行を入れて作成する　下のcountry,shopはphpで作成するもの
  var day = ['期限１', '期限２', '期限３', '期限４', '期限５'];
  var shop = ['店名１', '店名２', '店名３', '店名４', '店名５'];
  var content = ['内容１', '内容２', '内容３', '内容４', '内容５'];

var ul1 = document.getElementById("coupon_list");
for (var count = 0; count < 6; count++) {
    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('button');
    button1.type = "button";
    button1.classList.add("coupon");
    button1.classList.add("overlay-event");

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
    var shopname = document.createTextNode(shop[count]);
    var date = document.createTextNode(day[count]);
    var cont = document.createTextNode(content[count]);
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
   
}

var overlayev = document.getElementsByClassName("overlay-event");
  var events = Array.from(overlayev);
  var close = document.getElementById("close-btn1");
  var close2 = document.getElementById("close-btn2");

  //オーバーレイ開閉の関数
  const overlay = document.getElementById('overlay');
  function overlayToggle() {
    overlay.classList.toggle('overlay-on');
  }


  events.forEach(function(e){

    e.addEventListener('click', function(){
     
    e.setAttribute("disabled","");
   
    close.removeAttribute("disabled");
    close2.removeAttribute("disabled");
    //オーバーレイ開く
    overlayToggle();
  }, false);

  })
  
  //'いいえ'が押されたとき
  close2.addEventListener('click', function(){
    // ダブルクリック防止
    events.forEach(function(e){
      e.removeAttribute("disabled");
    })
    close2.setAttribute("disabled","");
    //オーバーレイ閉じる
    overlayToggle();
 }, false);

  close.addEventListener('click', function(){
    // ダブルクリック防止
    close.setAttribute("disabled","");
    //フォーム送信
    document.forms.form1.submit();
  }, false);          
    </script>
        
        
    </body>
</html>