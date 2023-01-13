<?php
/* セッション開始 */
session_start();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include "logout.php";
        $logout = new logout();
        $logout->logout("M-AC1.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-AC2</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="M_menu.css" type="text/css">
  <link rel="stylesheet" href="M-AC2.css" type="text/css">
  
</head>

<body bgcolor="#f0f8ff" >
    <center>
        <div class="box1">
            <font size="+3">
                ログアウトしますか？
            </font>
            <form action="" method="POST">   
                <button  class="sou" type="submit">
                    はい
                </button>
            </form>
                <button type="button" class="sou" onclick="location.href='M-AC2.php'">
                    いいえ
                </button>
        </div>       
    </center>
</body>
</html>