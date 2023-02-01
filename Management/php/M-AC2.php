<?php

if(!isset($_SESSION['administrator_id'])){
    $_SESSION['login_message'] = 'ログインしてください';
    header('Location:M-AC1.php');
    exit;
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
<main id="main">
        <form action="" method="POST" name="searchForm" onSubmit="return check();">
    <center>
        <div class="box1">
            <font size="+3">
                ログアウトしますか？
            </font>
                <button  class="sou" type="button" onclick="location.href='M-AC1.php'">
                    はい
                </button>
                <button type="button" class="sou" onclick="location.href='M-HK1.php'">
                    いいえ
                </button>
        </div>       
    </center>
        </form>
</main>
</body>
</html>