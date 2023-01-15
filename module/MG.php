<?php

include "MC-01.php";

//-----------------------------------------------------------------------------------------------------------------------------------------

//0と""の判定モジュール

function is_nullorempty($obj) {
            if($obj === 0 || $obj === "0"){
                return false;
            }

            return empty($obj);
}

//-----------------------------------------------------------------------------------------------------------------------------------------


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

    if (!is_nullorempty($report)) {
      $sql .= "AND report_total = ? ";
    }

    if (!is_nullorempty($stop)) {
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

    if (!is_nullorempty($report)) {
      $stmt->bindValue($n,$report);
      $n++;
    }

    if (!is_nullorempty($stop)) {
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

function MG_04($id1,$id2,$title,$who,$prefectures,$cost,$date1,$day,$total,$season,$date2) {

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

    if (!empty($date1)) {
      $sql .= "AND plan_date = ? ";
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

    if (!empty($date2)) {
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

    if (!empty($date1)) {
      $stmt->bindValue($n,$date1);
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

    if (!empty($date2)) {
      $stmt->bindValue($n,$date2);
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

function MG_06($id1,$id2,$title,$prefectures,$day_first,$day_end,$content,$place,$cost,$image,$total,$date) {

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

    if (!empty($day_first)) {
      $sql .= "AND event_day_first = ? ";
    }

    if (!empty($day_end)) {
      $sql .= "AND event_day_end = ? ";
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

    if (!empty($day_first)) {
      $stmt->bindValue($n,$day_first);
      $n++;
    }

    if (!empty($day_end)) {
      $stmt->bindValue($n,$day_end);
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

//計画お気に入りテーブル

function MG_07($id1,$id2,$id3) {

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

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//ユーザー通報テーブル

//-----------------------------------------------------------------------------------------------------------------------------------------

//クーポンテーブル

function MG_09($id1,$name,$id2,$place,$prefectures,$content,$deadline) {

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
      $sql .= "AND eventuser_id = ? ";
    }

    if (!empty($place)) {
      $sql .= "AND coupon_place = ? ";
    }

    if (!empty($prefectures)) {
      $sql .= "AND coupon_prefectures = ? ";
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

    if (!empty($place)) {
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!empty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
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

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//取得済みテーブル

function MG_10($id1,$id2,$id3) {

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

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//event検索モジュール

function MG_11($search,$prefectures,$day_first,$day_end) {

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM event WHERE 1 = 1 ";

    if (!is_nullorempty($search)) {
      $sql .= "AND event_title LIKE ? ";
    }

    if (!empty($prefectures)) {
      $sql .= "AND event_prefectures = ? ";
    }

    if (!empty($day_first)) {
      $sql .= "AND event_day_end >= ? ";
    }
    
    if (!empty($day_end)) {
      $sql .= "AND event_day_first <= ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($search)) {
      $search = '%'.$search.'%';
      $stmt->bindValue($n,$search);
      $n++;
    }

    if (!empty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!empty($day_first)) {
      $stmt->bindValue($n,$day_first);
      $n++;
    }

    if (!empty($day_end)) {
      $stmt->bindValue($n,$day_end);
      $n++;
    }

    $stmt->execute();

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//計画検索モジュール

function MG_12($search,$who,$prefectures,$cost,$date_first,$date_end,$day) {

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM plan WHERE 1 = 1 ";

    if (!is_nullorempty($search)) {
      $sql .= "AND plan_title LIKE ? ";
    }

    if (!empty($who)) {
      $sql .= "AND plan_who = ? ";
    }

    if (!empty($prefectures)) {
      $sql .= "AND plan_prefectures = ? ";
    }

    if (!is_nullorempty($cost)) {
      $sql .= "AND plan_cost >= ? AND plan_cost <= ? ";
    }

    if (!empty($date_first)) {
      $sql .= "AND plan_date >= ? ";
    }
    
    if (!empty($date_end)) {
      $sql .= "AND plan_date <= ? ";
    }

    if (!is_nullorempty($day)) {
      $sql .= "AND plan_day = ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($search)) {
      $search = '%'.$search.'%';
      $stmt->bindValue($n,$search);
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

    if (!is_nullorempty($cost)) {
      $cost_interval = 1;
      $cost_before = $cost - $cost_interval;
      $cost_after = $cost + $cost_interval;
      $stmt->bindValue($n,$cost_before);
      $n++;
      $stmt->bindValue($n,$cost_after);
      $n++;
    }

    if (!empty($date_first)) {
      $stmt->bindValue($n,$date_first);
      $n++;
    }

    if (!empty($date_end)) {
      $stmt->bindValue($n,$date_end);
      $n++;
    }

    if (!is_nullorempty($day)) {
      $stmt->bindValue($n,$day);
      $n++;
    }

    $stmt->execute();

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

//クーポン検索モジュール

function MG_13($search,$prefectures,$place,$deadline) {

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM coupon WHERE 1 = 1 ";

    if (!is_nullorempty($search)) {
      $sql .= "AND coupon_name LIKE ? ";
    }

    if (!empty($prefectures)) {
      $sql .= "AND coupon_prefectures = ? ";
    }

    if (!is_nullorempty($place)) {
      $sql .= "AND coupon_place LIKE ? ";
    }

    if (!empty($deadline)) {
      $sql .= "AND coupon_deadline <= ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($search)) {
      $search = '%'.$search.'%';
      $stmt->bindValue($n,$search);
      $n++;
    }

    if (!empty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!is_nullorempty($place)) {
      $place = '%'.$place.'%';
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!empty($deadline)) {
      $stmt->bindValue($n,$deadline);
      $n++;
    }

    $stmt->execute();

    return $stmt;
    
  } catch(PDOException $e){
    echo "DB接続失敗";
  }

}

//-----------------------------------------------------------------------------------------------------------------------------------------

