<?php
/* セッション開始 */
session_start();

  /* 退会処理 */
  if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    /* 退会 */
    include "MD.php";
    $delete = new MD();

    $type = [1];
    $delete->md("user", "user_id", $_SESSION['user_id'], $type);
   
    session_destroy(); // セッションを破壊
  
    header('Location:U-AC2.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC8</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "U-AC8.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>
    <body>
        <main id="main">

            <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button>

        <div align="center">
            <div class = "roundbox">
                <font size="+4">
                    アカウント消去規約
                </font><br>
    
                <font size="+2">
                    1.個人情報の取り扱いについて
                </font>
            </div><br>

            <form action=""  method="POST">
                <button type="submit" class="button-only">
                同意します
                </button>
            </form>
    
                <button type="submit" class="button-only" onclick="location.href='U-AC3.php'">
                同意しません
                </button>

       
        
        </div>
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

    </body>

</html> 