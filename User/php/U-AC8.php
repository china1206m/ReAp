<?php
/* セッション開始 */
session_start();
if(!isset($_SESSION['user_id'])) {
    $_SESSION['login_message'] = 'ログインしてください';
    header('Location:U-AC6.php');
    exit;
}

  /* 退会処理 */
  if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    /* 退会 */
    include "MG.php";
    include "MD.php";
    $delete = new MD();

    $type = [1];

    $user_id = $_SESSION['user_id'];

    $db = MG_04("",$user_id,"","","","","","","","","");
    $count1 = $db->rowCount();
    $plan = $db->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < $count1; $i++) : 
        $plan_id = $plan[$i]['plan_id'];

        $delete->delete("plan_detail", "plan_id", $plan_id, $type);

        $delete->delete("plan_favorite", "plan_id", $plan_id, $type);

    endfor;


    $delete->delete("plan_favorite", "user_id", $user_id, $type);
    
    $delete->delete("plan", "user_id", $user_id, $type);

    $delete->delete("user_report", "user_id", $user_id, $type);

    $delete->delete("get_coupon", "user_id", $user_id, $type);

    $delete->delete("user", "user_id", $user_id, $type);
   
    session_destroy(); // セッションを破壊
  
    header('Location:U-AC1.html');
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <main id="main">

        <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>

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