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
     $resposta = MySQL::query("SELECT * FROM $table $parametro");
    return $resposta->fetchAll();
   }
   static function insert($table,$valoresArr){
     if(!is_array($valoresArr)) return;
     foreach ($valoresArr as $key => $valor) {
       $valores += "'$valor',";
     }
     echo $valores;
     MySQL::Query("INSERT INTO  $table VALUES ");
   }

 }
