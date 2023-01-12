<?php
/* セッション開始 */
session_start();

  /* 退会処理 */
  if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    /* 退会 */
    include "MD.php";
    $delete = new MD();
  
    $_SESSION['user_id'] = 1;

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
        <link rel="stylesheet" href = "button.css">
        <link rel="stylesheet" href = "U-AC8.css">
    </head>
    <body>
        <div align="center">
            <div class = "roundbox">
                <p>
                <font size="+4">
                    アカウント消去規約
                </font><br>
    
                <font size="+2">
                    1.個人情報の取り扱いについて
                </font>
                </p>
            </div><br>

            <form action="U-AC2.html" class="button-only">
                <button type="submit" method="POST">
                同意します
                </button>
            </form>
    
            <form action="U-AC1.html" class="button-only">
                <button type="submit" method="POST">
                同意します
                </button>
            </form>
       
        
        </div>
    </body>

</html> 