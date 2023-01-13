<?php

include "MC-01.php";

//ユーザーテーブル

function MG_01($id,$mail,$pass,$name,$image,$message,$coupon,$report,$stop) {

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

    if (!empty($report)) {
      $sql .= "AND report_total = ? ";
    }

    if (!empty($stop)) {
      $sql .= "AND stop_total = ? ";
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

    if (!empty($report)) {
      $stmt->bindValue($n,$report);
      $n++;
    }

    if (!empty($stop)) {
      $stmt->bindValue($n,$stop);
      $n++;
    }

    $stmt->execute();

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//イベントユーザーテーブル

function MG_02($id,$mail,$pass,$name1,$name2,$number,$address,$name3,$image,$message) {

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

    if (!empty($name1)) {
      $sql .= "AND eventuser_name = ? ";
    }

    if (!empty($name2)) {
      $sql .= "AND representative_name = ? ";
    }

    if (!empty($number)) {
      $sql .= "AND phone_number = ? ";
    }

    if (!empty($address)) {
      $sql .= "AND address = ? ";
    }

    if (!empty($name3)) {
      $sql .= "AND enterprise_name = ? ";
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

    if (!empty($name1)) {
      $stmt->bindValue($n,$name1);
      $n++;
    }

    if (!empty($name2)) {
      $stmt->bindValue($n,$name2);
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
    if (!empty($name3)) {
      $stmt->bindValue($n,$name3);
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

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//管理者テーブル

function MG_03($id,$pass,$name) {

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

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//計画テーブル

function MG_04($id1,$id2,$title,$who,$prefectures,$cost,$day,$total,$season,$date) {

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

    if (!empty($title)) {
      $sql .= "AND plan_title = ? ";
    }

    if (!empty($who)) {
      $sql .= "AND plan_who = ? ";
    }

    if (!empty($prefectures)) {
      $sql .= "AND plan_prefectures = ? ";
    }

    if (!empty($cost)) {
      $sql .= "AND plan_cost = ? ";
    }

    if (!empty($day)) {
      $sql .= "AND plan_day = ? ";
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

    if (!empty($title)) {
      $stmt->bindValue($n,$title);
      $n++;
    }

    if (!empty($who)) {
      $stmt->bindValue($n,$who);
      $n++;
    }

    if (!empty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!empty($cost)) {
      $stmt->bindValue($n,$cost);
      $n++;
    }

    if (!empty($day)) {
      $stmt->bindValue($n,$day);
      $n++;
    }

    if (!empty($total)) {
      $stmt->bindValue($n,$total);
      $n++;
    }

    if (!empty($season)) {
      $stmt->bindValue($n,$favorite_season);
      $n++;
    }

    if (!empty($date)) {
      $stmt->bindValue($n,$date);
      $n++;
    }

    $stmt->execute();

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//計画詳細テーブル

function MG_05($id1,$id2,$place,$content,$stay_time_hour,$stay_time_minute,$image,$travel_time_hour,$travel_time_minute) {

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM plan_detail WHERE 1 = 1 ";

    if (!empty($id1)) {
      $sql .= "AND plan_detail_id = ? ";
    }

    if (!empty($id2)) {
      $sql .= "AND plan_id = ? ";
    }

    if (!empty($place)) {
      $sql .= "AND plan_place = ? ";
    }

    if (!empty($content)) {
      $sql .= "AND plan_content = ? ";
    }

    if (!empty($stay_time_hour)) {
      $sql .= "AND stay_time_hour = ? ";
    }

    if (!empty($stay_time_minute)) {
      $sql .= "AND stay_time_minute = ? ";
    }

    if (!empty($image)) {
      $sql .= "AND plan_image = ? ";
    }

    if (!empty($travel_time_hour)) {
      $sql .= "AND travel_time_hour = ? ";
    }

    if (!empty($travel_time_minute)) {
      $sql .= "AND travel_time_minute = ? ";
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

    if (!empty($place)) {
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!empty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    if (!empty($stay_time_hour)) {
      $stmt->bindValue($n,$stay_time_hour);
      $n++;
    }

    if (!empty($stay_time_minute)) {
      $stmt->bindValue($n,$stay_time_minute);
      $n++;
    }

    if (!empty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!empty($travel_time_hour)) {
      $stmt->bindValue($n,$travel_time_minute);
      $n++;
    }

    $stmt->execute();

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//イベントテーブル

function MG_06($id1,$id2,$title,$prefectures,$day,$content,$place,$cost,$image,$total,$date) {

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

    if (!empty($title)) {
      $sql .= "AND event_title = ? ";
    }

    if (!empty($prefectures)) {
      $sql .= "AND event_prefectures = ? ";
    }

    if (!empty($day)) {
      $sql .= "AND event_day = ? ";
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

    $stmt = $db->prepare($sql);


    if (!empty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!empty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!empty($title)) {
      $stmt->bindValue($n,$title);
      $n++;
    }

    if (!empty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!empty($day)) {
      $stmt->bindValue($n,$day);
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

    $stmt->execute();

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------
