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

    $sql = "DELETE from marca WHERE codigo = '$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados excluidos com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST["pesquisarmarca"])){
    $codigo = $_POST['codigo'];
    $sql = "SELECT * from marca WHERE codigo='$codigo'";
    $resultado = mysql_query($sql);
    if ($resultado == TRUE){
        while($dados = mysql_fetch_array($resultado)){
            echo" <table border=1>
            <tr><td>Codigo</td><td>Nome</td></tr>";
            echo "
            <tr>
              <td>".$dados['codigo']."</td>
              <td>".$dados['nome']."</td>
            </tr>
            ";
        }
    }
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

if (isset($_POST["pesquisarcategoria"])){
    $codigo = $_POST['codigo'];
    $sql = "SELECT * from categoria WHERE codigo='$codigo'";
    $resultado = mysql_query($sql);
    if ($resultado == TRUE){
        while($dados = mysql_fetch_array($resultado)){
            echo" <table border=1>
            <tr><td>Codigo</td><td>Nome</td></tr>";
            echo "
            <tr>
              <td>".$dados['codigo']."</td>
              <td>".$dados['nome']."</td>
            </tr>
            ";
        }
    }
}

//! ------------ TIPO --------------------


if (isset($_POST['gravartipo']))
{
    $codigo  = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert into tipo (codigo,nome) values ('$codigo','$nome')";
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

    $sql = "UPDATE tipo SET nome = '$nome' 
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

    $sql = "DELETE from tipo WHERE codigo = '$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado == true) {
        echo "Dados excluidos com sucesso!!!";
    }
    else {
        echo "Erro ao gravar os dados!!!";
    }
}

if (isset($_POST["pesquisartipo"])){
    $codigo = $_POST['codigo'];
    $sql = "SELECT * from tipo WHERE codigo='$codigo'";
    $resultado = mysql_query($sql);
    if ($resultado == TRUE){
        while($dados = mysql_fetch_array($resultado)){
            echo" <table border=1>
            <tr><td>Codigo</td><td>Nome</td></tr>";
            echo "
            <tr>
              <td>".$dados['codigo']."</td>
              <td>".$dados['nome']."</td>
            </tr>
            ";
        }
    }
}

//! ------------ PRODUTO --------------------


if (isset($_POST['gravarproduto']))
{
    $codigo            = $_POST['codigo'];
    $descricao         = $_POST['descricao'];
    $cor               = $_POST['cor'];
    $tamanho           = $_POST['tamanho'];
    $preco             = $_POST['preco'];
    $codmarca          = $_POST['codmarca'];
    $codcategoria      = $_POST['codcategoria'];
    $codtipo           = $_POST['codtipo'];
    $foto1             = $_FILES['foto1'];
    $foto2             = $_FILES['foto2'];

    $diretorio = "fotos/";
    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time().$extensao1);
    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1);

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time().$extensao2);
    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2);

   $sql = mysql_query("INSERT INTO produto (codigo,descricao,cor,tamanho,preco,codmarca,codcategoria,codtipo,foto1,foto2)
                values ('$codigo','$descricao','$cor','$tamanho','$preco','$codmarca','$codcategoria','$codtipo','$novo_nome1','$novo_nome2')");

   $resultado = mysql_query(query:: $sql);

   if ($resultado)
        {echo " Falha ao gravar os dados informados";}
   else
        {echo " Dados informados cadastrados com sucesso";}
}

if (isset($_POST['alterarproduto']))
{
    $codigo      = $_POST['codigo'];
    $descricao         = $_POST['descricao'];

    $sql = "UPDATE produto SET descricao = '$descricao' 
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

    $sql = "DELETE from produto WHERE codigo = '$codigo'";

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
    $sql = mysql_query("SELECT codigo,descricao,cor,tamanho,preco,codmarca,codcategoria,codtipo,foto1,foto2 FROM produto");
    
    if (mysql_num_rows($sql) == 0)
          {echo "Desculpe, mas sua pesquisa nao encontrou resultados.";}
    else
         {
         echo "<b>Produtos Cadastrados:</b><br><br>";
         while ($dados = mysql_fetch_object($sql))
          {
                echo "Codigo    : ".$dados->codigo."  ";
                echo "Desricao  : ".$dados->descricao." ";
                echo "Cor       : ".$dados->cor." ";
                echo "Tamanho   : ".$dados->tamanho." ";
                echo "Preco     : ".$dados->preco."<br>";
                echo "Marca     : ".$dados->codmarca."";
                echo "Categoria : ".$dados->codcategoria." ";
                echo "Tipo      : ".$dados->codtipo."<br>";
                echo '<img src="fotos/'.$dados->foto1.'"height="200" width="200" />'."  ";
                echo '<img src="fotos/'.$dados->foto2.'"height="200" width="200" />'."<br><br>  ";
         }
      }
 }
 
 ?>