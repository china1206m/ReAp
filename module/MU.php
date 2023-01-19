<?php

class MU{
    function db($sum){
        try{
            include "MC-01.php";
            // データベース接続
            $db = getDB();

            // SQL文をセット
            $stt = $db->prepare("UPDATE ".$sum);
            $stt->execute();
        }catch(PDOException $e){
            echo 'DB接続エラー:'.$e->getMessage();
            return $db;
        }
    }


    function mu($table, $column, $post, $type, $id_name, $id){
    
        $sum = $table." set ";
    
        for($i = 0; $i < count($post); $i++){
                
                 
            // 複数挿入の場合
            if($i >= 1){
                $sum = $sum.",";
            }   
    
            // 列名=
            $sum = $sum.$columnname[$i]."=";
                    
            // 型調べ
            if($type[$i] == 0) {
                sum = $sum.$post[$i];
                    
            // CHAR
            } else if($type[$i] == 1) {
            $sum = $sum."'".$post[$i]."'";
                    
            // NCHAR
            } else {
                $sum = $sum."N'".$post[$i]."'";
            }
        }

        $sum = $sum." WHERE ".$column_id."=".$id;

        $this->db($sum);
    
    }

    function favorite($num, $id){

        if($num == 1){
            $num = "+1";
        }else{
            $num ="-1";
        }
        
        $sum = "plan set plan_favorite_total = plan_favorite_total".$num."plan_favorite_season = plan_favorite_total".$num." WHERE plan_id = ".$id;
        $this->db($sum);
    }

    function reset(){
        $sum = "plan set plan_favorite_season = 0";
        $this->db($sum);
    }

    function report_count($id){
        $sum = "user set report_total = report_total + 1 WHERE user_id = ".$id;
        $this->db($sum);
    }
}