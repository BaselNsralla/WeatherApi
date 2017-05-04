
<?php 

function setupData(){

    $string = file_get_contents("../weather_data_170227 kl1234.csv");

    $string = mb_convert_encoding($string,"auto","UCS-2LE");
    $string =  utf8_encode($string);
    $data = explode("\n",$string);



    foreach($data as $key => $post){


        $data[$key] = explode("\t",$post);


        foreach ($data[$key] as $k => $field){

            $data[$key][$k] = trim(strval($field));

        }




    }


    return $data;


}






?>