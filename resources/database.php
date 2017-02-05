<?php

$username ='root';
$dsn ='mysql:host=localhost; dbname=register';
$password='';

try{

    $db = new PDO($dsn,$username,$password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "successfully connected to database";

}catch(PDOException $ex){

    echo "We are sorry our connection failed. ".$ex->getMessage();
}




 ?>
