<?php
 /**
  *
  */
global $config;
 class MySQL
 {
   const
    nTableData = "data",
    nTableuser = "user"
  ;
   static function conect(
     $dbHost="empty",
     $dbUsername="empty",
     $dbPassword="empty",
     $dbName="empty"
   ){
     global $config;
     if(
       $dbHost=="empty" ||
       $dbUsername=="empty" ||
       $dbPassword=="empty"||
       $dbName=="empty"
     ){
       $dbHost=$config->db_host;
       $dbName=$config->db_name;
      $dbUsername=$config->db_user;
       $dbPassword=$config->db_password;
     }
      try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch(PDOException $e) {
        if ($config->showerror)
          echo
            'ERROR: ' .
            $e->getMessage() . "\n" .
            "host: " . $dbHost .
            ", dbName: " . $dbName .
            ", dbUsername: " . $dbUsername
          ;
        return;
      }
      return $conn;
   }
   static function tableCreat(
     $dbHost="empty",
     $dbUsername="empty",
     $dbPassword="empty",
     $dbName="empty"
   ){
     global $config;
     if(
       $dbHost=="empty" ||
       $dbUsername=="empty" ||
       $dbPassword=="empty"||
       $dbName=="empty"
     ){
       $dbHost=$config->db_host;
       $dbName=$config->db_name;
      $dbUsername=$config->db_user;
       $dbPassword=$config->db_password;
     }
     $tableName = $config->db_prefix . MySQL::nTableData;
     MySQL::query("DROP TABLE {$tableName};");
     $query ="
     CREATE TABLE IF NOT EXISTS {$tableName} (
       `id` int(8) NOT NULL AUTO_INCREMENT,
       `data` varchar(500) NOT NULL,
       PRIMARY KEY (`id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
     ";
    return MySQL::query($query);

   }
   static function tableConfig(){
     return false;
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
