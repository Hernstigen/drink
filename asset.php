<?php
    session_start();
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="drink";
    $conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    function isLevel($level){
        if (isset($_SESSION['level'])){
            if(intval($_SESSION['level'])>=$level){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function showRating($number){
        $number=intval(round($number));
        $retStr="";
        for($vdo=0;$vdo<$number;$vdo++){
            $retStr.="🫒";
        }
        return $retStr;
    }

    function isAlcoholic($value){
        if($value){
            return "🥴";
        }else{
            return "😇";
        }
    }

    function isSelected($val){
        $val=boolval($val);
        if($val){
            return true;
        }else{
            return false;
        }
    }

?>