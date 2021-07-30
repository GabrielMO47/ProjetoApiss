<?php
 // Conectando ao banco de dados:
 include_once("conectar.php");
 
 // Recebendo os dados a pesquisar
 $pesquisa = $_POST['GET'];
?>

 <html>
 <head>
 <link href="estilos.css" rel="stylesheet" type="text/css">
 <title>Resultado da pesquisa</title>
 </head>
 <body>
 
 <!-- Criando tabela e cabeçalho de dados: -->
 <table border="1" style='width:50%'>
 <tr>
 <th>Tipo</th>
 <th>Empresa</th>
 <th>Funcionario</th>
 </tr>
 
 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
 $sql = "SELECT * FROM pedido WHERE id = '$pesquisa'";
 $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['Tipopedido'];
   $Empresa = $registro['NomeEmpresa'];
   $funcionario = $registro['NomeFuncionario'];
   echo "<tr>";
   echo "<td>".$nome."</td>";
   echo "<td>".$Empresa."</td>";
   echo "<td>".$funcionario."</td>";
   echo "</tr>";
 }
 mysqli_close($strcon);
 echo "</table>";
?>
</body>
</html>