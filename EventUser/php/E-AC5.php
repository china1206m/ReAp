<?php
/* セッション開始 */
session_start();

if(!isset($_SESSION['eventuser_id'])){
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:E-AC4.php');
  exit;
}

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_destroy();
    header('Location:E-AC4.php');
  exit;
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-AC5</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="E_button.css" type="text/css">
  <link rel="stylesheet" href="E-AC5.css" type="text/css">
  <link rel="stylesheet" href="E_position.css" type="text/css">
</head>

<body bgcolor="#f0f8ff" >
    <center>       
      
    
    <ul>
        <li><div class="box">
        <h3>ログアウトしてもよろしいですか？</h3>
    </div></li>
    <br><br><br>
    
    <li><div>
    <form action="" method="POST">
      <button type="submit"class="button-yes" onclick="location.href='' ">はい</button>
    </form>
  
   <button type="submit"class="button-yes" onclick="location.href='E-AC3.php'">いいえ</button>
    </div></li>
  </ul>
</center>
</body>