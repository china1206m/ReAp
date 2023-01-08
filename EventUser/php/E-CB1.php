<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-CB1</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="E-CB1.css" type="text/css">
  <link rel="stylesheet" href="E_button.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body>
  <main id="main">
  <h3>イベント投稿</h3>

  
  
  <form action="E-EL1.html" method="POST" enctype="multipart/form-data">
   
    <table>
      
      <tr>
        <td><p><label for="post_day" >投稿日</label></p></td>
        <td><img src="select_image.png" class="event_image" width="103px" height="85px"></td>
    </tr>
    <tr>
      <td><input type='date' id='date1' name="post_date" class="post_date"></p></td>
      <td><input type="file" name="event_image" class="event_image" accept="image/jpeg,image/png" multiple/></td>
    </tr>
</table>
    

    <p><label for="title">題名</label></p>
    <textarea name="event_title" class="event_title" minlength="1" maxlength="30" placeholder="30文字以内" required></textarea>
    
    <p><label for="place">開催場所</label></p>
    <textarea name="event_place" class="event_place" required></textarea>

<table>     
<tr>
  <td><p><label for="day">開催日</label></p></td>
  <td><p><label for="cost">費用</label></p></td>
</tr>
<tr>
  <td><input type="date" id="date" name="event_day" class="event_day" value="" required></td>
  <td><input type="money" id="date" name="event_cost" class="event_cost" minlength="1"></td>
  </tr>
</table>

<p><label for="content">本文</label></p>
<textarea name="event_content" class="event_content" minlength="1" maxlength="1000" placeholder="1000文字以内" required></textarea>

<center>
<button class="button-only" id="open-btn"  type="submit">投稿</button>
</form>
</center>
</main>

<aside id="sub">
  
  <ul>
    <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
    <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
    <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
    <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
   </ul>
</aside>

<script>
  window.addEventListener('DOMContentLoaded', () => {
    const element = document.getElementById('date1');
    const date = new Date();
    date.setMinutes(date.getMinutes() - date.getTimezoneOffset());
    element.value = element.min = date.toJSON().match(/\d+-\d+-\d+/);
  });
  </script>
</body>