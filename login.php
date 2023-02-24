<?php
$email = $_POST['email'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);

$connect = mysql_connect('localhost','Email','Senha');
$db = mysql_select_db('usuarios');
  if (isset($entrar)) {

    $verifica = mysql_query("SELECT * FROM usuarios WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('email e/ou senha incorretos');window.location
        .href='index.html';</script>";
        die();
      }else{
        setcookie("Email",$email);
        header("Location:index.php");
      }
  }
?>
