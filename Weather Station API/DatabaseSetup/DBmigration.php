<?php
require "../db.php";
require "setupData.php";

$data = setupData();

//STEP 1 
$sql  =  "INSERT into s (s,s1) VALUES(12,13)";
$stmt = $dbh->prepare($sql);
$svar = $stmt->execute();


//STEP 2
$sql2 = "Create Table IF NOT EXISTS general(
id int(10) AUTO_INCREMENT PRIMARY KEY
)";

$stmt2 = $dbh->prepare($sql2);
$stmt2->execute();

echo "</br>";
foreach($data[0] as $key => $title){
    $rub = str_replace(" ","",$title);
    $rub = str_replace("(","",$rub);
    $rub = str_replace(")","",$rub);
    $rub = str_replace("%","",$rub);
    $rub = str_replace("/","",$rub);

    echo "</br>";
    if($key == "0"){
        continue;
    } else{
        try{
            $sql = 'ALTER TABLE general ADD '.$rub.' varchar(255)';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

        } catch(PDOException $ex){
            /*echo $ex->getMessage();*/
            var_dump($ex);
        }
    }   

}
echo "TABLE CREATED"; 

?>
