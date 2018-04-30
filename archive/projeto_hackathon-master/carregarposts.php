
<?php

include 'conexaoh.php';
// $usuarioLogado = $_SESSION['usuarioLogado'];

// if($usuarioLogado !=""){
// //ta logado
// $iconeusuario = $_SESSION['iconeUsuarioLogado'];


// }else{
// //guest
// 	$iconeusuario = "default.png";
//     $codautor = "NULL";
// }

$tipopost = $_GET['tipopost'];
// $codusuario = $_SESSION['codUsuarioLogado'];


switch ($tipopost) {
    case 0:
    	// feed normal
    	// limite em 10, carregar mais -> puxa +10, ao final "voltar pro topo"
        $sql = "SELECT * FROM posts";

        break;
    case 1:
    	// meus interesses
    	// select interesses tags, explode tags, select from posts comparando tags explodidas
    	// $sql = "";

        break;
    case 2:
    	// meus posts
         $sql = "SELECT * FROM posts where codautor=".$codusuario."";

        break;
}




        $result = mysqli_query($conexao,$sql);
        if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

    	$idpost = $row['idpost'];
    	$datapost = $row['datapost'];
    	$hora = $row['hora'];
    	$titulo = $row['titulo'];
    	$corpo = $row['corpo'];
    	$codstags = $row['codstags'];
    	$imgsurl = $row['imgsurl'];
    	$codautor = $row['codautor'];
    	$totalup = $row['totalup'];
    	$totaldown = $row['totaldown'];
    	$codsverif = $row['codsverif'];
    	$comentoficial = $row['comentoficial'];
    	$statuspost = $row['statuspost'];
    	$nomeautor = $row['nomeautor'];

          $sql2 = "SELECT * FROM usuarios where idusuario=".$codautor."";
$result2 = mysqli_query($conexao,$sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $iconeusuario = $row2['imgicone'];
    }

}
    

        echo ' 
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="http://jdsitespalmas.com/projeto_hackathon/imagensupload/'.$iconeusuario.'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
         <span class="w3-right w3-large w3-btn" onclick="favoritarPost(this,'.$idpost.')"><i class="far fa-star"></i></span>
       
       
        <h5 style="margin-bottom: 1px">'.$nomeautor.'</h5>
         <span class="w3-left w3-opacity">1 min</span><br>
        <hr class="w3-clear" style="margin-top:10px;">
        <p id="corpo"><b>'.$titulo.'</b> - '.$corpo.'</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="imagensupload/'.$imgsurl.'" style="width:100%" alt="Imagem 1 Post" class="w3-margin-bottom">
            </div>
           
        </div>

        <button type="button" onclick="upvotefun('.$idpost.')" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fas fa-level-up-alt"></i>&nbsp;<span id="up'.$idpost.'">'.$totalup.'</span></button> 
        
        <button type="button" onclick="downvotefun('.$idpost.')" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fas fa-level-down-alt"></i>&nbsp;<span id="down'.$idpost.'">'.$totaldown.'</button> 
        <a href="whatsapp://send?text='.$titulo.': http://jdsitespalmas.com/projeto_hackathon/?p='.$idpost.'" data-action="share/whatsapp/share" class="w3-button w3-green w3-margin-bottom"><i class="fab fa-whatsapp">&nbsp;Compartilhar</i></a>
         
        <div class="w3-right">
          <b><i>Verificação:&nbsp;&nbsp; </i></b>
           <img onmouseover="document.getElementById(&#039;descriorg01&#039;).style.display= &#039;block&#039;" onmouseleave="document.getElementById(&#039;descriorg01&#039;).style.display=&#039;none&#039;"   src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-circle" style="width:20px">|
           <img onmouseover="document.getElementById(&#039;descriorg02&#039;).style.display=&#039;block&#039;" onmouseleave="document.getElementById(&#039;descriorg02&#039;).style.display=&#039;none&#039;" src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-circle" style="width:20px">|
           <img onmouseover="document.getElementById(&#039;descriorg03&#039;).style.display=&#039;block&#039;" onmouseleave="document.getElementById(&#039;descriorg03&#039;).style.display=&#039;none&#039;" src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-circle" style="width:20px"><br>
           <span class="w3-tag w3-small w3-white w3-card-4  w3-right" id="descriorg01" style="display: none">#lorem</span>
            <span class="w3-tag w3-small w3-white w3-card-4  w3-right" id="descriorg02" style="display: none">#ipsum</span>
            <span class="w3-tag w3-small w3-white w3-card-4 w3-right" id="descriorg03" style="display: none">#dolor</span>

        </div>';
        $tag = explode(',', $codstags);
        echo ' <p>
            <span class="w3-tag w3-small w3-theme-d5">#'.$tag[0].'</span>
            <span class="w3-tag w3-small w3-theme-d4">#'.$tag[1].'</span>
            <span class="w3-tag w3-small w3-theme-d3">#'.$tag[2].'</span>
            <span class="w3-tag w3-small w3-theme-d2">#'.$tag[3].'</span>
            <span class="w3-tag w3-small w3-theme-d1">#'.$tag[4].'</span>          
          </p>
      </div>';
    }
} else {
    echo ' <div class="w3-container w3-card w3-white w3-round w3-margin"><br><h3>Nenhum post encontrado :/</h3><br><p>Atualize a página em caso de persistência de erro.</p></div>';
}


?>