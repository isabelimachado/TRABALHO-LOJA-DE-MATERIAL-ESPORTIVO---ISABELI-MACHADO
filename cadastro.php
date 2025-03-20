<?php

//! ------------ MARCA --------------------


$conectar = mysql_connect("localhost","root","");
$banco = mysql_select_db("loja");


if (isset($_POST['gravarmarca']))
{
    $codigo  = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert into marca (codigo,nome) values ('$codigo','$nome')";
    $resultado = mysql_query($sql);
    if ($resultado == true)
    {
        echo "Dados gravados com sucesso!!!";
    }
    else
    {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['alterarmarca']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "UPDATE marca SET nome = '$nome' 
            WHERE codigo = '$codigo'";    

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados alterados com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['excluirmarca']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "DELETE from loja WHERE codigo = '$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados excluidos com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['pesquisarmarca']))
{
    $sql = "SELECT * FROM loja";
    $resultado = mysql_query($sql);
    echo "<h3> Marcas cadastradas: </h3>";
    echo"<table border=1><tr><td>Codigo</td><td>Nome</td>";

    while ($dados = mysql_fetch_array($resultado))
    {
        echo "
        <td>".$dados['codigo']."</td>
        <td>".$dados['nome']."</td>
        </tr>";
    }
    echo "</table";
}


//! ------------ CATEGORIA --------------------


if (isset($_POST['gravarcategoria']))
{
    $codigo  = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert into categoria (codigo,nome) values ('$codigo','$nome')";
    $resultado = mysql_query($sql);
    if ($resultado == true)
    {
        echo "Dados gravados com sucesso!!!";
    }
    else
    {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['alterarcategoria']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "UPDATE categoria SET nome = '$nome' 
            WHERE codigo = '$codigo'";    

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados alterados com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['excluircategoria']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "DELETE from categoria WHERE codigo = '$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados excluidos com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['pesquisarcategoria']))
{
    $sql = "SELECT * FROM loja";
    $resultado = mysql_query($sql);
    echo "<h3> Categorias cadastradas: </h3>";
    echo"<table border=1><tr><td>Codigo</td><td>Nome</td>";

    while ($dados = mysql_fetch_array($resultado))
    {
        echo "
        <td>".$dados['codigo']."</td>
        <td>".$dados['nome']."</td>
        </tr>";
    }
    echo "</table";
}

//! ------------ TIPO --------------------


if (isset($_POST['gravartipo']))
{
    $codigo  = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert into categoria (codigo,nome) values ('$codigo','$nome')";
    $resultado = mysql_query($sql);
    if ($resultado == true)
    {
        echo "Dados gravados com sucesso!!!";
    }
    else
    {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['alterartipo']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "UPDATE categoria SET nome = '$nome' 
            WHERE codigo = '$codigo'";    

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados alterados com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['excluirtipo']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "DELETE from categoria WHERE codigo = '$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados excluidos com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['pesquisartipo']))
{
    $sql = "SELECT * FROM loja";
    $resultado = mysql_query($sql);
    echo "<h3> Categorias cadastradas: </h3>";
    echo"<table border=1><tr><td>Codigo</td><td>Nome</td>";

    while ($dados = mysql_fetch_array($resultado))
    {
        echo "
        <td>".$dados['codigo']."</td>
        <td>".$dados['nome']."</td>
        </tr>";
    }
    echo "</table";
}

//! ------------ PRODUTO --------------------


if (isset($_POST['gravarproduto']))
{
    $codigo  = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert into categoria (codigo,nome) values ('$codigo','$nome')";
    $resultado = mysql_query($sql);
    if ($resultado == true)
    {
        echo "Dados gravados com sucesso!!!";
    }
    else
    {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['alterarproduto']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "UPDATE categoria SET nome = '$nome' 
            WHERE codigo = '$codigo'";    

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados alterados com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['excluirproduto']))
{
    $codigo      = $_POST['codigo'];
    $nome        = $_POST['nome'];

    $sql = "DELETE from categoria WHERE codigo = '$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados excluidos com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST['pesquisarproduto']))
{
    $sql = "SELECT * FROM loja";
    $resultado = mysql_query($sql);
    echo "<h3> Categorias cadastradas: </h3>";
    echo"<table border=1><tr><td>Codigo</td><td>Nome</td>";

    while ($dados = mysql_fetch_array($resultado))
    {
        echo "
        <td>".$dados['codigo']."</td>
        <td>".$dados['nome']."</td>
        </tr>";
    }
    echo "</table";
}