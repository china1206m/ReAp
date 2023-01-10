<?php

function MG_01($id,$mail,$pass,$name,$image,$message,$coupon) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM user WHERE 1 = 1 ";

    if (!empty($id)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($mail)) {
      $sql .= "AND user_mail = ? ";
    }

    if (!empty($pass)) {
      $sql .= "AND user_pass = ? ";
    }

    if (!empty($name)) {
      $sql .= "AND user_name = ? ";
    }

    if (!empty($image)) {
      $sql .= "AND profile_image = ? ";
    }

    if (!empty($message)) {
      $sql .= "AND profile_message = ? ";
    }

    if (!empty($coupon)) {
      $sql .= "AND coupon_can_get = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id)) {
      $stmt->bindValue($n,$id);
      $n++;
    }

    if (!empty($mail)) {
      $stmt->bindValue($n,$mail);
      $n++;
    }

    if (!empty($pass)) {
      $stmt->bindValue($n,$pass);
      $n++;
    }

    if (!empty($name)) {
      $stmt->bindValue($n,$name);
      $n++;
    }

    if (!empty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!empty($message)) {
      $stmt->bindValue($n,$message);
      $n++;
    }

    if (!empty($coupon)) {
      $stmt->bindValue($n,$coupon);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------


function MG_02($id1,$id2,$id3) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM get_coupon WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND get_coupon_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($id3)) {
      $sql .= "AND coupon_id = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($id3)) {
      $stmt->bindValue($n,$id3);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_03($id1,$name,$id2,$content,$deadline) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM coupon WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND coupon_id = ? ";
    }

    if (!empty($name)) {
      $sql .= "AND coupon_name = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND enterprise_id = ? ";
    }

    if (!empty($content)) {
      $sql .= "AND coupon_content = ? ";
    }

    if (!empty($deadline)) {
      $sql .= "AND coupon_deadline = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($name)) {
      $stmt->bindValue($n,$name);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    if (!empty($deadline)) {
      $stmt->bindValue($n,$deadline);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_04($id1,$mail,$pass,$name1,$number,$address,$name2) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM enterprise WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND enterprise_id = ? ";
    }

    if (!empty($mail)) {
      $sql .= "AND enterprise_mail = ? ";
    }

    if (!empty($pass)) {
      $sql .= "AND enterprise_pass = ? ";
    }

    if (!empty($name1)) {
      $sql .= "AND representative_name = ? ";
    }

    if (!empty($number)) {
      $sql .= "AND phone_number = ? ";
    }

    if (!empty($address)) {
      $sql .= "AND address = ? ";
    }

    if (!empty($name2)) {
      $sql .= "AND enterprise_name = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($mail)) {
      $stmt->bindValue($n,$mail);
      $n++;
    }

    if (!empty($pass)) {
      $stmt->bindValue($n,$pass);
      $n++;
    }

    if (!empty($name1)) {
      $stmt->bindValue($n,$name1);
      $n++;
    }

    if (!empty($number)) {
      $stmt->bindValue($n,$number);
      $n++;
    }

    if (!empty($address)) {
      $stmt->bindValue($n,$address);
      $n++;
    }

    if (!empty($name2)) {
      $stmt->bindValue($n,$name2);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_05($id,$pass,$name) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM administrator WHERE 1 = 1 ";

    if (!empty($id)) {
      $sql .= "AND administrator_id = ? ";
    }

    if (!empty($pass)) {
      $sql .= "AND administrator_pass = ? ";
    }

    if (!empty($name)) {
      $sql .= "AND administrator_name = ? ";
    }


    $stmt = $db->prepare($sql);


    if (!empty($id)) {
      $stmt->bindValue($n,$id);
      $n++;
    }

    if (!empty($pass)) {
      $stmt->bindValue($n,$pass);
      $n++;
    }

    if (!empty($name)) {
      $stmt->bindValue($n,$name);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_06($id1,$id2,$content,$place,$cost,$image,$total,$season,$date) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM plan WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND plan_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($content)) {
      $sql .= "AND plan_content = ? ";
    }

    if (!empty($place)) {
      $sql .= "AND plan_place = ? ";
    }

    if (!empty($cost)) {
      $sql .= "AND plan_cost = ? ";
    }

    if (!empty($image)) {
      $sql .= "AND plan_image = ? ";
    }

    if (!empty($total)) {
      $sql .= "AND plan_favorite_total = ? ";
    }

    if (!empty($season)) {
      $sql .= "AND plan_favorite_season = ? ";
    }

    if (!empty($date)) {
      $sql .= "AND post_date = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    if (!empty($place)) {
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!empty($cost)) {
      $stmt->bindValue($n,$cost);
      $n++;
    }

    if (!empty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!empty($total)) {
      $stmt->bindValue($n,$total);
      $n++;
    }

    if (!empty($season)) {
      $stmt->bindValue($n,$season);
      $n++;
    }

    if (!empty($date)) {
      $stmt->bindValue($n,$date);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_07($id1,$id2,$id3,$content) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM plan_report WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND plan_report_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($id3)) {
      $sql .= "AND plan_id = ? ";
    }

    if (!empty($content)) {
      $sql .= "AND report_content = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($id3)) {
      $stmt->bindValue($n,$id3);
      $n++;
    }

    if (!empty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_08($id1,$id2,$total,$date) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM stop_user WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND stop_user_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($total)) {
      $sql .= "AND report_total = ? ";
    }

    if (!empty($date)) {
      $sql .= "AND stop_date = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($total)) {
      $stmt->bindValue($n,$total);
      $n++;
    }

    if (!empty($date)) {
      $stmt->bindValue($n,$date);
      $n++;
    }
    
    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_09($id1,$id2,$id3,$content) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM user_report WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND user_report_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($id3)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($content)) {
      $sql .= "AND report_content = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($id3)) {
      $stmt->bindValue($n,$id3);
      $n++;
    }

    if (!empty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }
    
    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_10($id,$mail,$pass,$name,$image,$message) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM eventuser WHERE 1 = 1 ";

    if (!empty($id)) {
      $sql .= "AND eventuser_id = ? ";
    }

    if (!empty($mail)) {
      $sql .= "AND eventuser_mail = ? ";
    }

    if (!empty($pass)) {
      $sql .= "AND eventuser_pass = ? ";
    }

    if (!empty($name)) {
      $sql .= "AND eventuser_name = ? ";
    }

    if (!empty($image)) {
      $sql .= "AND profile_image = ? ";
    }

    if (!empty($message)) {
      $sql .= "AND profile_message = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id)) {
      $stmt->bindValue($n,$id);
      $n++;
    }

    if (!empty($mail)) {
      $stmt->bindValue($n,$mail);
      $n++;
    }

    if (!empty($pass)) {
      $stmt->bindValue($n,$pass);
      $n++;
    }

    if (!empty($name)) {
      $stmt->bindValue($n,$name);
      $n++;
    }

    if (!empty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!empty($message)) {
      $stmt->bindValue($n,$message);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_11($id1,$id2,$content,$place,$cost,$image,$total,$date,$title,$day) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM event WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND event_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND eventuser_id = ? ";
    }

    if (!empty($content)) {
      $sql .= "AND event_content = ? ";
    }

    if (!empty($place)) {
      $sql .= "AND event_place = ? ";
    }

    if (!empty($cost)) {
      $sql .= "AND event_cost = ? ";
    }

    if (!empty($image)) {
      $sql .= "AND event_image = ? ";
    }

    if (!empty($total)) {
      $sql .= "AND event_favorite_total = ? ";
    }

    if (!empty($date)) {
      $sql .= "AND post_date = ? ";
    }

    if (!empty($title)) {
      $sql .= "AND event_title = ? ";
    }

    if (!empty($day)) {
      $sql .= "AND event_day = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    if (!empty($place)) {
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!empty($cost)) {
      $stmt->bindValue($n,$cost);
      $n++;
    }

    if (!empty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!empty($total)) {
      $stmt->bindValue($n,$total);
      $n++;
    }

    if (!empty($date)) {
      $stmt->bindValue($n,$date);
      $n++;
    }

    if (!empty($title)) {
      $stmt->bindValue($n,$title);
      $n++;
    }

    if (!empty($day)) {
      $stmt->bindValue($n,$day);
      $n++;
    }

    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

function MG_12($id1,$id2,$id3) {

  include "MC-01.php";

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM plan_favorite WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND plan_favorite_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!empty($id3)) {
      $sql .= "AND plan_id = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($id3)) {
      $stmt->bindValue($n,$id3);
      $n++;
    }
    
    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

?>