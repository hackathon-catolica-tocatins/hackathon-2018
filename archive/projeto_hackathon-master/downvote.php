<?php

include 'conexaoh.php';



	$idpost = $_GET["idpost"];
	$sql_getdown= "select totaldown from posts where idpost=".$idpost."";
	if($result = mysqli_query($conexao,$sql_getdown)){
	while($coliuna = mysqli_fetch_row($result)){
        $totaldown = $coluna[0];
        $totaldown = intval($totaldown);
        $totaldown++;
        mysqli_query($conexao,"update posts set totaldown=".$totaldown." where idpost=".$idpost."")or die("Erro na linha 12");
        echo $totaldown++;
    }
}
?>