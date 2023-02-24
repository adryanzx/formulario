<?php

$nome = $_POST['Nome'];
$email = MD5($_POST['Email']);
$senha = $_POST['Senha'];
$confirmar senha = MD5($_POST['Confirmar senha']);

$connect = mysql_connect('localhost','Nome','Email','Senha','Confirmar Senha');
$db = mysql_select_db('usuarios');
$query_select = "SELECT Nome FROM usuarios WHERE Email = '$Email'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['Email'];

  if($email== "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('Os campo deve ser preenchido');window.location.href='
    index.html';</script>";

    }else{
      if($logarray == $email){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse email já existe');window.location.href='
        index.html';</script>";
        die();

      }else{
        $query = "INSERT INTO usuarios (email,senha) VALUES ('$email','$senha')";
        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='index.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='index.html'</script>";
        }
      }
    }
?>