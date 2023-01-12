<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title></U-AC15></title>
     <meta charset = "UTF-8">
     <link rel="stylesheet" href = "button.css">
     <link rel="stylesheet" href = "U-AC15.css">
     <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>
    <body>
      <main id="main">
      <button type="button" class="button_back" onclick="history.back()"><h3 class="button_back">＜</h3></button>


    <div align="center">

        <font size="+4" class="k1">
            所持クーポン一覧
        </font>

        <ol type="1" id="numberlist">
            <li>
                <button type="button" class="coupon">
                    <div class="left">
                        <div class="price"></div>
                    </div>
                
                    <div class="right">
                        <div class="date">有効期限 年 月 日</div>
                    </div> 
                </button>  
            </li>
        </ol>
                
    </div>

    <div align="right" class="k2">
      <button id="open-btn" class="overlay-event" "type="button">
          消去
      </button>
  </div>
  
  <div id="overlay" class="overlay-event">
    <div class="flex">
      <div id="overlay-inner">
        <p>選択したクーポンを消去します。<br>
            <font color = "red">
                本当によろしいですか？
            </font><br></p>
        <button onclick="disp()" id="close-btn"  type=button href = "U-AC14.html">
            はい
        </button>
        <button id="close-btn" class="overlay-event" type=button href = "U-AC15.html">
            いいえ
        </button>
      </div>
    </div>
  </div>
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
  </script>
       
    
</body>
</html>