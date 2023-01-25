<?php

include_once "MC-01.php";

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

    if (!is_nullorempty($id)) {
      $sql .= "AND user_id = ? ";
    }

    if (!is_nullorempty($mail)) {
      $sql .= "AND user_mail = ? ";
    }

    if (!is_nullorempty($pass)) {
      $sql .= "AND user_pass = ? ";
    }

    if (!is_nullorempty($name)) {
      $sql .= "AND user_name = ? ";
    }

    if (!is_nullorempty($image)) {
      $sql .= "AND profile_image = ? ";
    }

    if (!is_nullorempty($message)) {
      $sql .= "AND profile_message = ? ";
    }

    if (!is_nullorempty($coupon)) {
      $sql .= "AND coupon_can_get = ? ";
    }

    if (!is_nullorempty($report)) {
      $sql .= "AND report_total = ? ";
    }

    if (!is_nullorempty($stop)) {
      $sql .= "AND stop_total = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id)) {
      $stmt->bindValue($n,$id);
      $n++;
    }

    if (!is_nullorempty($mail)) {
      $stmt->bindValue($n,$mail);
      $n++;
    }

    if (!is_nullorempty($pass)) {
      $stmt->bindValue($n,$pass);
      $n++;
    }

    if (!is_nullorempty($name)) {
      $stmt->bindValue($n,$name);
      $n++;
    }

    if (!is_nullorempty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!is_nullorempty($message)) {
      $stmt->bindValue($n,$message);
      $n++;
    }

    if (!is_nullorempty($coupon)) {
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

    if (!is_nullorempty($id)) {
      $sql .= "AND eventuser_id = ? ";
    }

    if (!is_nullorempty($mail)) {
      $sql .= "AND eventuser_mail = ? ";
    }

    if (!is_nullorempty($pass)) {
      $sql .= "AND eventuser_pass = ? ";
    }

    if (!is_nullorempty($name1)) {
      $sql .= "AND eventuser_name = ? ";
    }

    if (!is_nullorempty($name2)) {
      $sql .= "AND representative_name = ? ";
    }

    if (!is_nullorempty($number)) {
      $sql .= "AND phone_number = ? ";
    }

    if (!is_nullorempty($address)) {
      $sql .= "AND address = ? ";
    }

    if (!is_nullorempty($name3)) {
      $sql .= "AND enterprise_name = ? ";
    }

    if (!is_nullorempty($image)) {
      $sql .= "AND profile_image = ? ";
    }

    if (!is_nullorempty($message)) {
      $sql .= "AND profile_message = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id)) {
      $stmt->bindValue($n,$id);
      $n++;
    }

    if (!is_nullorempty($mail)) {
      $stmt->bindValue($n,$mail);
      $n++;
    }

    if (!is_nullorempty($pass)) {
      $stmt->bindValue($n,$pass);
      $n++;
    }

    if (!is_nullorempty($name1)) {
      $stmt->bindValue($n,$name1);
      $n++;
    }

    if (!is_nullorempty($name2)) {
      $stmt->bindValue($n,$name2);
      $n++;
    }

    if (!is_nullorempty($number)) {
      $stmt->bindValue($n,$number);
      $n++;
    }

    if (!is_nullorempty($address)) {
      $stmt->bindValue($n,$address);
      $n++;
    }
    if (!is_nullorempty($name3)) {
      $stmt->bindValue($n,$name3);
      $n++;
    }

    if (!is_nullorempty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!is_nullorempty($message)) {
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

    if (!is_nullorempty($id)) {
      $sql .= "AND administrator_id = ? ";
    }

    if (!is_nullorempty($pass)) {
      $sql .= "AND administrator_pass = ? ";
    }

    if (!is_nullorempty($name)) {
      $sql .= "AND administrator_name = ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id)) {
      $stmt->bindValue($n,$id);
      $n++;
    }

    if (!is_nullorempty($pass)) {
      $stmt->bindValue($n,$pass);
      $n++;
    }

    if (!is_nullorempty($name)) {
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

    if (!is_nullorempty($id1)) {
      $sql .= "AND plan_id = ? ";
    }

    if (!is_nullorempty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!is_nullorempty($title)) {
      $sql .= "AND plan_title = ? ";
    }

    if (!is_nullorempty($who)) {
      $sql .= "AND plan_who = ? ";
    }

    if (!is_nullorempty($prefectures)) {
      $sql .= "AND plan_prefectures = ? ";
    }

    if (!is_nullorempty($cost)) {
      $sql .= "AND plan_cost = ? ";
    }

    if (!is_nullorempty($date1)) {
      $sql .= "AND plan_date = ? ";
    }

    if (!is_nullorempty($day)) {
      $sql .= "AND plan_day = ? ";
    }

    if (!is_nullorempty($total)) {
      $sql .= "AND plan_favorite_total = ? ";
    }

    if (!is_nullorempty($season)) {
      $sql .= "AND plan_favorite_season = ? ";
    }

    if (!is_nullorempty($date2)) {
      $sql .= "AND post_date = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!is_nullorempty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!is_nullorempty($title)) {
      $stmt->bindValue($n,$title);
      $n++;
    }

    if (!is_nullorempty($who)) {
      $stmt->bindValue($n,$who);
      $n++;
    }

    if (!is_nullorempty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!is_nullorempty($cost)) {
      $stmt->bindValue($n,$cost);
      $n++;
    }

    if (!is_nullorempty($date1)) {
      $stmt->bindValue($n,$date1);
      $n++;
    }

    if (!is_nullorempty($day)) {
      $stmt->bindValue($n,$day);
      $n++;
    }

    if (!is_nullorempty($total)) {
      $stmt->bindValue($n,$total);
      $n++;
    }

    if (!is_nullorempty($season)) {
      $stmt->bindValue($n,$favorite_season);
      $n++;
    }

    if (!is_nullorempty($date2)) {
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

    if (!is_nullorempty($id1)) {
      $sql .= "AND plan_detail_id = ? ";
    }

    if (!is_nullorempty($id2)) {
      $sql .= "AND plan_id = ? ";
    }

    if (!is_nullorempty($place)) {
      $sql .= "AND plan_place = ? ";
    }

    if (!is_nullorempty($content)) {
      $sql .= "AND plan_content = ? ";
    }

    if (!is_nullorempty($stay_time_hour)) {
      $sql .= "AND stay_time_hour = ? ";
    }

    if (!is_nullorempty($stay_time_minute)) {
      $sql .= "AND stay_time_minute = ? ";
    }

    if (!is_nullorempty($image)) {
      $sql .= "AND plan_image = ? ";
    }

    if (!is_nullorempty($travel_time_hour)) {
      $sql .= "AND travel_time_hour = ? ";
    }

    if (!is_nullorempty($travel_time_minute)) {
      $sql .= "AND travel_time_minute = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!is_nullorempty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!is_nullorempty($place)) {
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!is_nullorempty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    if (!is_nullorempty($stay_time_hour)) {
      $stmt->bindValue($n,$stay_time_hour);
      $n++;
    }

    if (!is_nullorempty($stay_time_minute)) {
      $stmt->bindValue($n,$stay_time_minute);
      $n++;
    }

    if (!is_nullorempty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!is_nullorempty($travel_time_hour)) {
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

    if (!is_nullorempty($id1)) {
      $sql .= "AND event_id = ? ";
    }

    if (!is_nullorempty($id2)) {
      $sql .= "AND eventuser_id = ? ";
    }

    if (!is_nullorempty($title)) {
      $sql .= "AND event_title = ? ";
    }

    if (!is_nullorempty($prefectures)) {
      $sql .= "AND event_prefectures = ? ";
    }

    if (!is_nullorempty($day_first)) {
      $sql .= "AND event_day_first = ? ";
    }

    if (!is_nullorempty($day_end)) {
      $sql .= "AND event_day_end = ? ";
    }

    if (!is_nullorempty($content)) {
      $sql .= "AND event_content = ? ";
    }

    if (!is_nullorempty($place)) {
      $sql .= "AND event_place = ? ";
    }

    if (!is_nullorempty($cost)) {
      $sql .= "AND event_cost = ? ";
    }

    if (!is_nullorempty($image)) {
      $sql .= "AND event_image = ? ";
    }

    if (!is_nullorempty($total)) {
      $sql .= "AND event_favorite_total = ? ";
    }

    if (!is_nullorempty($date)) {
      $sql .= "AND post_date = ? ";
    }

    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!is_nullorempty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!is_nullorempty($title)) {
      $stmt->bindValue($n,$title);
      $n++;
    }

    if (!is_nullorempty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!is_nullorempty($day_first)) {
      $stmt->bindValue($n,$day_first);
      $n++;
    }

    if (!is_nullorempty($day_end)) {
      $stmt->bindValue($n,$day_end);
      $n++;
    }

    if (!is_nullorempty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    if (!is_nullorempty($place)) {
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!is_nullorempty($cost)) {
      $stmt->bindValue($n,$cost);
      $n++;
    }

    if (!is_nullorempty($image)) {
      $stmt->bindValue($n,$image);
      $n++;
    }

    if (!is_nullorempty($total)) {
      $stmt->bindValue($n,$total);
      $n++;
    }

    if (!is_nullorempty($date)) {
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

    if (!is_nullorempty($id1)) {
      $sql .= "AND plan_favorite_id = ? ";
    }

    if (!is_nullorempty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!is_nullorempty($id3)) {
      $sql .= "AND plan_id = ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!is_nullorempty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!is_nullorempty($id3)) {
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

    if (!is_nullorempty($id1)) {
      $sql .= "AND coupon_id = ? ";
    }

    if (!is_nullorempty($name)) {
      $sql .= "AND coupon_name = ? ";
    }

    if (!is_nullorempty($id2)) {
      $sql .= "AND eventuser_id = ? ";
    }

    if (!is_nullorempty($place)) {
      $sql .= "AND coupon_place = ? ";
    }

    if (!is_nullorempty($prefectures)) {
      $sql .= "AND coupon_prefectures = ? ";
    }

    if (!is_nullorempty($content)) {
      $sql .= "AND coupon_content = ? ";
    }

    if (!is_nullorempty($deadline)) {
      $sql .= "AND coupon_deadline = ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!is_nullorempty($name)) {
      $stmt->bindValue($n,$name);
      $n++;
    }

    if (!is_nullorempty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!is_nullorempty($place)) {
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!is_nullorempty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!is_nullorempty($content)) {
      $stmt->bindValue($n,$content);
      $n++;
    }

    if (!is_nullorempty($deadline)) {
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

    if (!is_nullorempty($id1)) {
      $sql .= "AND get_coupon_id = ? ";
    }

    if (!is_nullorempty($id2)) {
      $sql .= "AND user_id = ? ";
    }

    if (!is_nullorempty($id3)) {
      $sql .= "AND coupon_id = ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($id1)) {
      $stmt->bindValue($n,$id1);
      $n++;
    }

    if (!is_nullorempty($id2)) {
      $stmt->bindValue($n,$id2);
      $n++;
    }

    if (!is_nullorempty($id3)) {
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

function MG_11($search,$prefectures,$day_first,$day_end,$cost) {

  $n = 1;

  try{

    $db = getDB();

    $sql = "SELECT * FROM event WHERE 1 = 1 ";

    if (!is_nullorempty($search)) {
      $sql .= "AND event_title LIKE ? ";
    }

    if (!is_nullorempty($prefectures)) {
      $sql .= "AND event_prefectures = ? ";
    }

    if (!is_nullorempty($day_first)) {
      $sql .= "AND event_day_end >= ? ";
    }
    
    if (!is_nullorempty($day_end)) {
      $sql .= "AND event_day_first <= ? ";
    }

    if (!is_nullorempty($cost)) {
      $sql .= "AND event_cost >= ? AND event_cost <= ? ";
    }

    $sql .= "LIMIT 50";


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($search)) {
      $search = '%'.$search.'%';
      $stmt->bindValue($n,$search);
      $n++;
    }

    if (!is_nullorempty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!is_nullorempty($day_first)) {
      $stmt->bindValue($n,$day_first);
      $n++;
    }

    if (!is_nullorempty($day_end)) {
      $stmt->bindValue($n,$day_end);
      $n++;
    }

    if (!is_nullorempty($cost)) {
      $cost_interval = 500;
      $cost_before = $cost - $cost_interval;
      $cost_after = $cost + $cost_interval;
      $stmt->bindValue($n,$cost_before);
      $n++;
      $stmt->bindValue($n,$cost_after);
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

    if (!is_nullorempty($who)) {
      $sql .= "AND plan_who = ? ";
    }

    if (!is_nullorempty($prefectures)) {
      $sql .= "AND plan_prefectures = ? ";
    }

    if (!is_nullorempty($cost)) {
      $sql .= "AND plan_cost >= ? AND plan_cost <= ? ";
    }

    if (!is_nullorempty($date_first)) {
      $sql .= "AND plan_date >= ? ";
    }
    
    if (!is_nullorempty($date_end)) {
      $sql .= "AND plan_date <= ? ";
    }

    if (!is_nullorempty($day)) {
      $sql .= "AND plan_day = ? ";
    }

    $sql .= "LIMIT 50";


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($search)) {
      $search = '%'.$search.'%';
      $stmt->bindValue($n,$search);
      $n++;
    }

    if (!is_nullorempty($who)) {
      $stmt->bindValue($n,$who);
      $n++;
    }

    if (!is_nullorempty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!is_nullorempty($cost)) {
      $cost_interval = 500;
      $cost_before = $cost - $cost_interval;
      $cost_after = $cost + $cost_interval;
      $stmt->bindValue($n,$cost_before);
      $n++;
      $stmt->bindValue($n,$cost_after);
      $n++;
    }

    if (!is_nullorempty($date_first)) {
      $stmt->bindValue($n,$date_first);
      $n++;
    }

    if (!is_nullorempty($date_end)) {
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

    if (!is_nullorempty($prefectures)) {
      $sql .= "AND coupon_prefectures = ? ";
    }

    if (!is_nullorempty($place)) {
      $sql .= "AND coupon_place LIKE ? ";
    }

    if (!is_nullorempty($deadline)) {
      $sql .= "AND coupon_deadline >= ? ";
    }


    $stmt = $db->prepare($sql);


    if (!is_nullorempty($search)) {
      $search = '%'.$search.'%';
      $stmt->bindValue($n,$search);
      $n++;
    }

    if (!is_nullorempty($prefectures)) {
      $stmt->bindValue($n,$prefectures);
      $n++;
    }

    if (!is_nullorempty($place)) {
      $place = '%'.$place.'%';
      $stmt->bindValue($n,$place);
      $n++;
    }

    if (!is_nullorempty($deadline)) {
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

