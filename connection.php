<?php
  
  $usuario = "root";
  $senha = "";

  try {
    $conn = new PDO('mysql:host=localhost;dbname=curriculo', $usuario, $senha);
    //print "Conectado";
  }catch (PDOException $ex){
    print "Erro ao conectar ao banco de dados";
  }  
?>