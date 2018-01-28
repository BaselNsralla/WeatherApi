<?php 
require "db.php";
require "Categories.php";
$arr =  Categories();

if(isset($_GET["weather"])){
    $opt = $_GET["weather"];
    if($opt=="general"){
       fullReq($opt,$dbh);
    } else {
    inDirect($opt,$dbh);
    }
}


function direct($option,$dbh){
    $sql = "SELECT ".$option." FROM general ORDER BY id DESC LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $response = $stmt->fetch();
    if  ($response != null){
      echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }else{
      echo "400 BAD request: request is malformed";  
    }
}

function inDirect($opt,$dbh){
        $nyckel = -1;
        global $arr;
        foreach($arr as $key => $val){
            if  (strtolower($opt) ==  strtolower($val)){
                $nyckel = $key;
                break;
            }
        }
        if  ($nyckel != -1) {
            $sql = "SELECT * FROM general ORDER BY id DESC LIMIT 1";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $response = $stmt->fetch();
            $i = 0;
            foreach ($response as $key => $value){
                if  ($nyckel == $i){
                    $nyckel = $key;
                    break;
                }
                $i++;
            }
            $v = $response[$nyckel];
            $newQ = array($nyckel=>$v);
            echo json_encode($newQ, JSON_UNESCAPED_UNICODE);
        } else {
            direct($opt, $dbh);
        }
}

function fullReq($opt,$dbh){
     $sql = "SELECT * FROM general ORDER BY id DESC LIMIT 1";
        $stmt = $dbh->prepare($sql);
        $stmt -> execute();
        $response = json_encode($stmt->fetch(),JSON_UNESCAPED_UNICODE);
        echo $response;
}

?>
