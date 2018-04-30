<?php

	include 'conexaoh.php';

	$idpost = $_GET['idpost'];

		$sql = "select nomeautor,datapost,hora,titulo,imgsurl,codautor,totalup,totaldown"
        $result = mysqli_query($conexao,$sql);
        if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){


			echo '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
         <span class="w3-right w3-large w3-btn" onclick="favoritarPost(this)" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19)"><i class="fas fa-star" style="color:#ffbf00;"></i></span>
       
       
        <h5 style="margin-bottom: 1px">'.$row['nomeautor'].'</h5>
         <span class="w3-left w3-opacity">'.$row['datapost'].' - '.$row['hora'].'</span><br>
        <hr class="w3-clear" style="margin-top:10px;">
        <p id><b>'.$row['titulo'].'...</b><br>
          
         <span class="w3-btn w3-large w3-theme-d5" href="https://jdsitespalmas.com/projeto_hackathon/imagensupload/'.$row['imgsurl'].'"> <i class="fas fa-camera"></i>&nbsp;Ver Fotos</span>

        <br>
          <center>
              <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fas fa-level-up-alt"></i>&nbsp;'.$totalup.'</button> 
              
              <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fas fa-level-down-alt"></i>&nbsp;'.$totaldown.'</button> 
              
               
            <br>
                <a href="http://jdsitespalmas.com/projeto_hackathon/?q='.$idpost.'">Ler post completo</a></p>
          </center>
      </div>
';



			}
		}


	
?>