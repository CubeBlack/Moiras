<?php
 /**
  *
  */
 class MySQL
 {
   static function conect($dbHost=Config::db_host,$dbName=Config::db_name,$dbUsername=Config::db_user,$dbPassword=Config::db_password){
      try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch(PDOException $e) {
        if (Config::db_showerror)
          echo 'ERROR: ' . $e->getMessage();
        return;
      }
      return $conn;
   }
   static function query($query){
     $conn = Mysql::conect();
     return $conn->query($query);
   }
   static function select($parametro="",$table=Config::db_table)
   {
    return MySQL::query("SELECT * FROM $table $parametro");
   }
 }
