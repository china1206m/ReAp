<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" media="screen" href="U-AC18.css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    <title>U-AC18</title>
  </head>

  <body>
    <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3 class="button_back">＜</h3></button>


    <div align="center">
        <font size="+6">
            投稿一覧
        </font><br>
    </div>

    <font size="+3" class="kl">
        計画
    </font>

    <ol type="1" id="numberlist">
        
    </ol>
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

      // 四角の数を動的に変化
      //文字列はphpで作成しそれを引っ張ってくる
        var ol = document.getElementById("numberlist");
                for(var count = 0; count < 4; count++){
                    var li = document.createElement('li');
                    li.classList.add("box");

                    var div1 = document.createElement('div');

                    var a1 = document.createElement('a');
                    a1.href = "U-AC22.html";
                
                    var img1 = document.createElement('img');
                    img1.width = '20';
                    img1.height = '20';
                    img1.src = 'hensyu.png';
                    img1.align = 'right';
                    



                    var div2 = document.createElement('div');

                    var p = document.createElement('p');
                    p.innerText = '投稿のやつ'

                    var div3 = document.createElement('div');
                    div3.classList.add("kt");

                    var a2 = document.createElement('a');
                    a2.classList.add("overlay-event");
                    a2.type = 'buton';

                    var img2 = document.createElement('img');
                    img2.width = '20';
                    img2.height = '20';
                    img2.src = 'gomibako.png';
                    img2.align = 'right';

                    var a3 = document.createElement('a');
                    a3.classList.add("more-see");
                    a3.href = "U-AC21.html";
                    a3.align = 'right';
                    a3.innerText = "...もっと見る";
                    

                    


                    ol.appendChild(li);
                    li.appendChild(div1);
                    div1.appendChild(a1);
                    a1.appendChild(img1);
                    li.appendChild(div2);
                    div2.appendChild(p);
                    li.appendChild(div3);
                    div3.appendChild(a2);
                    a2.appendChild(img2);
                    li.appendChild(a3);
                    

                    
    }
    </script>
  </body>
</html>