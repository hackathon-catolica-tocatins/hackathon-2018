<?php

include "conexaoh.php";


$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];




$target_dir = "imagensupload/";
$target_file = $target_dir . basename($_FILES["icone"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["icone"]["tmp_name"]);
    if($check !== false) {
        echo "<p>Arquivo é uma imagem - " . $check["mime"] . ".</p>";
        $uploadOk = 1;
    } else {
        echo "<p style='color:red;'>Arquivo não é uma imagem.</p>";
        $uploadOk = 0;
    }

}
if ($uploadOk == 0) {
    echo "<p style='color:red;'>1- Erro no upload do arquivo.</p>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["icone"]["tmp_name"], $target_file)) {
        // echo "<p>O arquivo ". basename( $_FILES["icone"]["name"]). " foi enviado com sucesso.</p>";
       
        $sql_inserirpost = "insert into usuarios(nome,cpf,telefone,imgicone,senha) values('$nome','$cpf','$telefone','".basename( $_FILES["icone"]["name"])."','$senha')";
        //echo $sql_inserirpost;
        mysqli_query($conexao,$sql_inserirpost) or die ("<p style='color:red;'>Erro no momento de realizar cadastro.</p>");

        $sql_selec = "select max(idusuario) as maiorid from usuarios";
        $result = mysqli_query($conexao,$sql_selec);

        if ($result->num_rows > 0) {
    // output data of each row
            while($row = $result->fetch_assoc()) {

            mysqli_query($conexa,"create table favoritos".$row['maioride']."( idpost int not null)");

     }
    }
        
    }else{

        echo "<p style='color:red;'>2- Erro no upload do arquivo.</p>";
    }
}
header('Location:index.php?c=1');
?>