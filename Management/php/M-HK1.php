<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-HK1</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="M-HK1.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <h3>投稿イベント</h3>

    <div>
      <ul id="country_list">
          
      </ul>
    
    
      <div > 
        <ul>
            <li>
                <button type="button" onclick="location.href='M-SC1.php'"><img src="serch_image.png"  height ="40" width="40"/></button>
                <button type="button" onclick="location.href='M-HK4.php'"><img src="rank.png" height ="40" width="40" /></button>
            </li>
            <li>
                <button id="open-btn" class="overlay-event" "type="button">
                    お気に入り数リセット
                </button>
            </li>
        </ul>
      </div>
    </div>

    <span id="overlay" class="overlay-event">
        <span class="flex">
          <span id="overlay-inner">
              <p>上記のクーポンを取得します。<br>
                <font color = "red">
                    本当によろしいですか？
                </font><br>
              </p>
              <div>
                  <button onclick="disp()" id="close-btn" type=button href = "U-AC14.html">
                      はい
                  </button>
                  <button id="close-btn"  class="overlay-event" type=button href = "U-AC11.html">
                      いいえ
                  </button>
              </div>
            
          </span>
        </span>
      </span>
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

  // 四角の数を動的に変化
  //文字列はphpで作成しそれを引っ張ってくる
  var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];

  var ul = document.getElementById("country_list");
  for (var count = 0; count < 3; count++) {
	// li要素を作成
	var li = document.createElement('li');
  li.classList.add("event_information");

  // アイコンを作成
  var img = document.createElement('img');
  img.classList.add("circle");
  img.src = 'monky.png';
  img.align = 'left'
  img.alt = 'アイコン'
  img.width = 100;
  img.height = 100;

  // 題名を作成
  var div = document.createElement('div');
  div.className = 'title';
  var daimei = document.createTextNode(country[count]);
  div.appendChild(daimei);

  // 本文を作成
  var p = document.createElement('p');
  p.classList.add("limit");
  var text = document.createTextNode(country[count]);
  p.appendChild(text);

  // もっと見るを作成
  var a = document.createElement('a');
  a.classList.add("more-see");
  a.href = "E-SE4.php";
  a.innerText = "...もっと見る";
  
  // それぞれの要素を追加したい場所へ追加
  ul.appendChild(li);
  li.appendChild(img);
  li.appendChild(div);
  li.appendChild(p);
  li.appendChild(a);
}
</Script>
</body>