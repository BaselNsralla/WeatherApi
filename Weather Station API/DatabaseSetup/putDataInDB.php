<?php 
require "../db.php";
require "setupData.php";

$data = setupData();
$deleted = array_shift($data); 
$pop = array_pop($data);

/* $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

$a = "swag";
foreach($data as $key => $post){
    $sql = "INSERT INTO general (Tid, Intervall, LuftfuktighetInne, LuftfuktighetUte, RelativtLufttryckhpa, AbsolutLufttryckhpa, Vindhastighetkmh, Vindbykmh, Vindriktning, TemperaturInne°C, TemperaturUte°C, Daggpunkt°C, Vindavkylning°C, RegnmängdTimmemm, Regnmängd24Timmarmm, RegnmängdVeckamm, RegnmängdMånadmm, RegnmängdTotalmm) 
        VALUES(
        :a1,
        :a2, 
        :a3, 
        :a4,              
        :a5, 
        :a6,
        :a7,
        :a8,
        :a9,
        :a10,
        :a11,
        :a12,
        :a13,
        :a14,
        :a15,
        :a16,
        :a17,
        :a18)";

    $stmt = $dbh->prepare($sql);
    $b = 0;
    foreach($post as $ny=>&$val){
        if  ($b ==0){
            $b++; 
            continue;
        }
        $c = strval($b);
        $para = ':a'.$c;
        $stmt->bindParam($para,$val);
        $b++;       
    }
    $stmt->execute();
}

echo "Data har putats";
?>
