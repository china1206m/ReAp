<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC14</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "U-AC14.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>
    <body>
        <main id="main">
        <form action="" method="POST" name="searchForm" onSubmit="return check();"></form>
        <button type="submit" class="button_back" onclick="history.back()"><h3>＜</h3></button>

        

        <div align="center">

            <font size="+4">
                所持クーポン一覧
            </font>

            <font size="+2" id="write" class="write">
            </font>
            
            <ul id="coupon_list1">      
            </ul>
                    
        </div>

    </form>
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

var ul1 = document.getElementById("coupon_list1");

var count = 0;
if(count == 0){
    var write = document.getElementById("write");
    write.innerHTML = "所持しているクーポンはありません";
}else{
for (var count = 0; count < 6; count++) {
    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('a');
    button1.type = "button";
    button1.classList.add("coupon");
    button1.href = 'U-AC15.php';

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
            }
        </script>

        

    </body>
</html>