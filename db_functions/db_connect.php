<?php
/**
 * Created by PhpStorm.
 * User: Tais
 * Date: 10.11.2018
 * Time: 10:24
 */

class db_connect
{
  private $pdo;

  public function __construct()
  {
      try {
          $connection_string = "pgsql:host=127.0.0.1;port=5432;dbname=test_user";
          $this->pdo = new PDO($connection_string, "tais", "tais", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      }
      catch (PDOException $e) {
          echo "Невозможно установить соединение с базой данных\n".$e->getMessage();
      }
  }

  public function insert_user($name, $mail, $username, $pass) {
      $salt = random_bytes(22);
      $options = [
          'salt' => $salt
      ];
      $hash = password_hash($pass, PASSWORD_DEFAULT, $options);
      $salt = mb_convert_encoding($salt, "UTF-8");
      $query = "insert into public.users (name, email, username, password, salt) values (:name, :email, :username, :password, :salt)";
      $result = $this->pdo->prepare($query);
      $result->bindParam(":name", $name, PDO::PARAM_STR);
      $result->bindParam(":email", $mail, PDO::PARAM_STR);
      $result->bindParam(":username", $username, PDO::PARAM_STR);
      $result->bindParam(":password", $hash, PDO::PARAM_STR);
      $result->bindParam(":salt", $salt, PDO::PARAM_STR);
      $result->execute();
  }

  public function __destruct()
  {
      // TODO: Implement __destruct() method.
      $this->pdo = null;
  }
}

?>