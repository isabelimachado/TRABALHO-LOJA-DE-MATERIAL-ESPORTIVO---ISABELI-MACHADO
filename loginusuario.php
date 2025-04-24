<?php
$acessar  = mysql_connect('localhost','root','');
$banco    = mysql_select_db('loja');

if (isset($_POST['enviarLogin']))
{
$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT login, senha FROM usuario
        WHERE login = '$login' and senha = '$senha'";

$resultado = mysql_query($sql);

if (mysql_num_rows($resultado) > 0 )
{
   echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos >:-(');
        window.location.href='login.html';
        </script>";
    }
    else
    {
        setcookie('login',$login);
        header('Location:todoscadastros.html');
    }
}
?>