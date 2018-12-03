<?php
header('Access-Control-Allow-Origin:*');
  try{
  	  $host="localhost";
      $suser="admin";
      $spass="";
      $db="prueba_db";
        $link = new PDO('mysql:host='.$host.';dbname='.$db, $suser, $spass,array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

  }catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
