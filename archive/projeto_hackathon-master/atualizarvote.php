<?php

include 'conexaoh.php';
	$id = $_GET["id"];
	$tipovote = $_GET["tipovote"];
	$idpost = $_GET["idpost"];
	if($id == ""){

		$sql_totalvote = "select total".$tipovote." from posts where idpost=".$idpost."";
	if($resulte = mysqli_query($conexao,$sql_totalvote)){
		while ($coluna = mysqli_fetch_row($resulte)) {
			echo $coluna[0];

		}
	}

}else{	
	


}

	

?>