<?php

include 'conexaoh.php';

	$idpost = $_GET["idpost"];
	$sql_getup = "select totalup from posts where idpost=".$idpost."";
	if($result = mysqli_query($conexao,$sql_getup)){

		while($coluna = mysqli_fetch_row($result)){
        $totalup = $coluna[0];
        $totalup = intval($totalup);
        $totalup++;
        mysqli_query($conexao,"update posts set totalup=".$totalup." where idpost=".$idpost."")or die("Erro na linha 12");
     	echo $totalup++;
             }
		}
	


?>