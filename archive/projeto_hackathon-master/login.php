<?php 
include 'conexaoh.php';
$cpf = $_POST['cpf'];
$senha = $_POST['pass'];
if($cpf !="" && $senha !=""){

  $sql_login = "SELECT * FROM usuarios where cpf='".$cpf."' and senha='".$senha."'";
  //echo $sql_login;
  $resultado = mysqli_query($conexao,$sql_login);

  if($resultado->num_rows > 0){
    //login correto
    while($row = $resultado->fetch_assoc()){
      $_SESSION['codUsuarioLogado'] = $row['idusuario'];
      $_SESSION['logincerto'] = "block";
      $_SESSION['loginerrado'] = "none";
    }

  }else{
    //login errado
     $_SESSION['logincerto'] = "none";
      $_SESSION['loginerrado'] = "block";
  }

}else{
   $_SESSION['logincerto'] = "none";
   $_SESSION['loginerrado'] = "block";
}
// echo  $_SESSION['codUsuarioLogado']. "<br>";
// echo $_SESSION['logincerto'] . "<br>";
// echo $_SESSION['loginerrado'] . "<br>";

header('Location:index.php');

?>