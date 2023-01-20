<?php
include_once "MC-01.php";

function MG($table, $get) {
    $db = getDB();
    
    $sum_post= "1 = 1"; // 最終挿入値post
    $column = null;
    $type = null;
    $user = ["user_id", "user_mail", "user_pass", "user_name", "profile_image", "profile_message", "coupon_can_get", "report_total", "stop_total"];
    $user_type = [0,1,1];

    $administrator = ["administrator_id", "administrator_pass", "administrator_name"];
    $administrator_type = [0, 1, 1];



    switch($table){
        case "user":
            $column = $user;
            $type = $user_type;
            break;
        case "administrator":
            $column = $administrator;
            $type = $administrator_type;
            break;
    }

    for($i = 0; $i < count($get); $i++) {
        if(!empty($get[$i])){
            
            if($type[$i] == 0) {
            } else if($type[$i] == 1) {
                $get[$i] = "'".$get[$i]."'";
                // NCHAR
            } else {
                $get[$i] = "N'".$get[$i]."'";
            }

            $sum_post = $sum_post." AND ".$column[$i]." = ".$get[$i];
        }
    }



    $stt = $db->prepare("SELECT * FROM ".$table." WHERE ".$sum_post);
                // INSERT命令を実行
                $stt->execute();

                return $stt;
}
?>