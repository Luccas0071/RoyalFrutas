<?php

class Database {

  private $host ='localhost';
  private $usuario ='root';
  private $senha ='';
  private $banco ='royalfrutas';
  private $porta ='3306';

  public function __construct() {
        
    //Fonte de dados contem as informaçoes necessarias para conectar ao banco de dados.
    $dsn = 'mysql:host='.$this-> host. ';port='.$this->porta.';dbname'.$this->banco;

    $opcoes = [
      //Armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão, resultando em um aplicação mais rapida
      PDO:: ATTR_PERSISTENT => true,
      //lança uma PDOException se ocorrer um erro
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
      //Aqui cria a instancia do PDO
      $this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);
    }catch(PDOException $e) {
      print "Error:" .$e->getMessage() . "<br/>";
      die();
    }
  }
}

?>