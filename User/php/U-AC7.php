<?php
/* セッション開始 */
session_start();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include "logout.php";
        $logout = new logout();
        $logout->logout("U-AC6.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-AC7</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="U-AC7.css" type="text/css">
  <link rel="stylesheet" href="button.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  
        <center>
            
            
        <ul>
            <li><div class="box">
            <h3>ログアウトしてもよろしいですか？</h3>
        </div></li>
        <br><br><br>
        
        <li><div>
        <form action="" method="POST">
        <button type="submit"class="button-yes">はい</button>
        </form>
      
       <button type="submit"class="button-yes" onclick="location.href='U-AC3.php'">いいえ</button>
        </div></li>
      </ul>
    </center>



</body>