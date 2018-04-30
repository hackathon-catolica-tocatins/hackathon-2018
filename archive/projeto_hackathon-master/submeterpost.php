<?php

include "conexaoh.php";

$titulopost = $_POST['titulopost'];
$corpopost = $_POST['corpopost'];
$localpost = $_POST['localpost'];
$tag1 = $_POST['tag1'];
$codstags = $_POST['tags'];
$nomeautor = $_POST['nomeautor'];
$codautor = $_POST['codautor'];
$data = date("d/m/Y");
$hora= date("h:i:s");


$target_dir = "imagensupload/";
$target_file = $target_dir . basename($_FILES["arquivo1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["arquivo1"]["tmp_name"]);
    if($check !== false) {
        echo "<p>Arquivo é uma imagem - " . $check["mime"] . ".</p>";
        $uploadOk = 1;
    } else {
        echo "<p>Arquivo não é uma imagem.</p>";
        $uploadOk = 0;
    }

}
if ($uploadOk == 0) {
    echo "<p>Erro no upload do arquivo.</p>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["arquivo1"]["tmp_name"], $target_file)) {
        // echo "<p>O arquivo ". basename( $_FILES["arquivo1"]["name"]). " foi enviado com sucesso.</p>";
       
        $sql_inserirpost = "insert into posts(datapost,hora,titulo,corpo,codstags,imgsurl,codautor,codsverif,nomeautor) values('$data','$hora','$titulopost','$corpopost','$codstags','".basename($_FILES["arquivo1"]["name"])."',$codautor,'0','$nomeautor')";
        echo $sql_inserirpost;
        mysqli_query($conexao,$sql_inserirpost) or die ("<p>Erro no momento de inserir post.</p>");

        $sql_getide = "select MAX(idpost) as maioride from posts";
        $result = mysqli_query($conexao,$sql_getide);

        if ($result->num_rows > 0) {
            // output data of each row

            while($row = $result->fetch_assoc()) {
                $ide = $row['maioride'];
            }
        }


    $sql_updatefoto = "update posts set imgsurl='".basename( $_FILES["arquivo1"]["name"])."' where idepost= ".$ide."";
    echo $sql_updatefoto;
        mysqli_query($conexao,$sql_updatefoto) or die ("<p>Erro no momento de salvar a imagem para post.</p>");
        
    } else {

        echo "<p>Erro no upload do arquivo.</p>";
    }
}

 header('Location:index.php');
?>