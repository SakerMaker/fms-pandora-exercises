<?php

abstract class Appointment_DB {
  private static $server = 'lamp-mysql8';
  private static $db = 'appointment_db';
  private static $user = 'tiger';
  private static $password = 'tiger';

  // Conexión con la DB
  public static function connectDB() {
    try {
      $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
    } catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
    }
 
    return $connection;
  }
}

?>