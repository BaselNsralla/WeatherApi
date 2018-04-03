<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        #localhost{
            color:firebrick;            
        }
    
    </style>
</head>

<body>
    <h1> Welcome to Berzelius weather station API</h1>
    <div>
    <h3>End Point:</h3>
    <p id = "localhost">localhost: http://localhost/weather/api.php?weather={category}</p>  
    </div>
    
    <div>
        <p>You have to put a category instead of {category} which will return a JSON value of the latest update on the weather. </p>
    </div>
    <div>
        <h3>Categories:</h3>
        <ul>
        <li>general : this will return all information about the last update of the weather</li>
        <?php
         include "Categories.php";
         $arr = Categories();
           foreach ($arr as $val){
        ?>
              <li> <?php echo $val ?></li>
        <?php 
           } 
         ?>
        </ul>
    </div>
</body>
</html>
