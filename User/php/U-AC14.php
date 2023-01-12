<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC14</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "button.css">
        <link rel="stylesheet" href = "U-AC14.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>
    <body>
        <main id="main">
        <button type="button" class="button_back" onclick="history.back()"><h3 class="button_back">＜</h3></button>

        

        <div align="center">

            <font size="+4">
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

        <div class="k2">
            <button "type="button" onclick="location.href='U-AC15.html'" class="button-only">
                使用
            </button>
        </div>
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
            var ol = document.getElementById("numberlist");
                for(var count = 0; count < 3; count++){
                    var li = document.createElement('li');
                    
                    var button = document.createElement('button');
                    button.classList.add("coupon");
                    button.type = 'button;'

                    var div1 = document.createElement('div');
                    div1.classList.add("left");

                    var div2 = document.createElement('div');
                    div2.classList.add("price");

                    var div3 = document.createElement('div');
                    div3.classList.add("right");

                    var div4 = document.createElement('div');
                    div4.classList.add("date");
                    div4.innerText = "有効期限 年 月 日";
                    

                    ol.appendChild(li);
                    li.appendChild(button);
                    button.appendChild(div1);
                    div1.appendChild(div2);
                    button.appendChild(div3);
                    div3.appendChild(div4);
                }
        </script>

        

    </body>
</html>