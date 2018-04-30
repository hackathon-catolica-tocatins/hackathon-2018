
<?php

include 'conexaoh.php';



?>

<!DOCTYPE html>
<html>
<title>Projeot Hackathon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css"> -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}


.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

@media only screen and (max-width: 600px) {
    .jacadastrado{
        display: center;
  }
} 
@media only screen and (min-width: 600px) {
    .cssentradagrid{
     margin-left: 20%;

      /* border: solid 2px red; */
    }

} 


@keyframes spinner {
  0% {
    transform: rotateZ(0deg);
  }
  100% {
    transform: rotateZ(359deg);
  }
}
* {
  box-sizing: border-box;
}

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

.login {
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
}
.login.loading button {
  max-height: 100%;
  padding-top: 50px;
}
.login.loading button .spinner {
  opacity: 1;
  top: 40%;
}
.login.ok button {
  background-color: #8bc34a;
}
.login.ok button .spinner {
  border-radius: 0;
  border-top-color: transparent;
  border-right-color: transparent;
  height: 20px;
  animation: none;
  transform: rotateZ(-45deg);
}
.login input {
  display: block;
  padding: 15px 10px;
  margin-bottom: 10px;
  width: 100%;
  border: 1px solid #ddd;
  transition: border-width 0.2s ease;
  border-radius: 2px;
  color: #ccc;
}
.login input + i.fa {
  color: #fff;
  font-size: 1em;
  position: absolute;
  margin-top: -47px;
  opacity: 0;
  left: 0;
  transition: all 0.1s ease-in;
}
.login input:focus {
  outline: none;
  color: #444;
  border-color: #4d636f;
  border-left-width: 35px;
}
.login input:focus + i.fa {
  opacity: 1;
  left: 30px;
  transition: all 0.25s ease-out;
}
.login a {
  font-size: 0.8em;
  color: #4d636f;
  text-decoration: none;
}
.login .title {
  color: #444;
  font-size: 1.2em;
  font-weight: bold;
  margin: 10px 0 30px 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
}
.login button {
  width: 100%;
  height: 100%;
  padding: 10px 10px;
  background: #4d636f;
  color: #fff;
  display: block;
  border: none;
  margin-top: 20px;
  position: absolute;
  left: 0;
  bottom: 0;
  max-height: 60px;
  border: 0px solid rgba(0, 0, 0, 0.1);
  border-radius: 0 0 2px 2px;
  transform: rotateZ(0deg);
  transition: all 0.1s ease-out;
  border-bottom-width: 7px;
}
.login button .spinner {
  display: block;
  width: 40px;
  height: 40px;
  position: absolute;
  border: 4px solid #ffffff;
  border-top-color: rgba(255, 255, 255, 0.3);
  border-radius: 100%;
  left: 50%;
  top: 0;
  opacity: 0;
  margin-left: -20px;
  margin-top: -20px;
  animation: spinner 0.6s infinite linear;
  transition: top 0.3s 0.3s ease, opacity 0.3s 0.3s ease, border-radius 0.3s ease;
  box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.2);
}
.login:not(.loading) button:hover {
  box-shadow: 0px 1px 3px #4d636f;
}
.login:not(.loading) button:focus {
  border-bottom-width: 4px;
}




</style>
<script type="text/javascript">
  

function initFunc() {
  carregarPosts(0);
}

function carregarFeed(elemento){

  elemento.innerHTML ='<h5><b><i>Feed</i></b></h5>';
  elemento.setAttribute('class','w3-third w3-white w3-center w3-btn');
  document.getElementById('menumi').setAttribute('class','w3-third w3-theme-l3 w3-center w3-btn');
  document.getElementById('menump').setAttribute('class','w3-third w3-theme-l3 w3-center w3-btn');
  carregarPosts(0);

}

function carregarFeedMI(elemento){
  elemento.innerHTML ='<h5><b><i>Meus Interesses</i></b></h5>';
  elemento.setAttribute('class','w3-third w3-white w3-center w3-btn');
  document.getElementById('menufeed').setAttribute('class','w3-third w3-theme-l3 w3-center w3-btn');
  document.getElementById('menump').setAttribute('class','w3-third w3-theme-l3 w3-center w3-btn');
  carregarPosts(1);

}

function carregarFeedMP(elemento){
  elemento.innerHTML ='<h5><b><i>Meus Posts</i></b></h5>';
  elemento.setAttribute('class','w3-third w3-white w3-center w3-btn');
  document.getElementById('menufeed').setAttribute('class','w3-third w3-theme-l3 w3-center w3-btn');
  document.getElementById('menumi').setAttribute('class','w3-third w3-theme-l3 w3-center w3-btn');
  carregarPosts(2);

}



function carregarPosts(tipopost) {
  console.log(tipopost);
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      console.log(this.responseText);
      document.getElementById("posts").innerHTML=this.responseText;
         
    }
  }
  xmlhttp.open("GET","carregarposts.php?tipopost="+tipopost,true);
  xmlhttp.send();
}

function upvotefun(idpost) {
  console.log(idpost);
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      console.log(this.responseText);
      document.getElementById("up"+idpost).innerHTML=this.responseText;
      atualizarvote("up",idpost);   
    }
  }
  xmlhttp.open("GET","upvote.php?idpost="+idpost,true);
  xmlhttp.send();
}
function atualizarvote(tipovote,idpost){
 
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      console.log(this.responseText);
      document.getElementById("'"+tipovote+""+idpost+"'").innerHTML=this.responseText;
      
    }
  }
  xmlhttp.open("GET","atualizarvote.php?tipovote="+tipovote+"&idpost="+idpost,true);
  xmlhttp.send();

}

function downvotefun(idpost) {
  console.log(idpost);
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      console.log(this.responseText);
      document.getElementById("down"+idpost).innerHTML=this.responseText;
      atualizarvote("down",idpost);
         
    }
  }
  xmlhttp.open("GET","downvote.php?idpost="+idpost,true);
  xmlhttp.send();
}

/*

Acidente: <input type="radio" name="myRadio1" onchange="myFunction(this)" value=0 class="radio"><br>
Água:     <input type="radio" name="myRadio2" onchange="myFunction(this)" value=1 class="radio"><br>
Alagamento<input type="radio" name="myRadio3" onchange="myFunction(this)" value=2 class="radio"><br>
Energia:  <input type="radio" name="myRadio4" onchange="myFunction(this)" value=3 class="radio"><br>
Segurança <input type="radio" name="myRadio5" onchange="myFunction(this)" value=4 class="radio"><br>
Saúde:    <input type="radio" name="myRadio6" onchange="myFunction(this)" value=5 class="radio"><br>
<p>Click the "Try it" button to check the radio button.</p>

<input type="text" id="inputi" value="">

<script>
function myFunction(elemento) {
  var radios = document.getElementsByClassName('radio');
    var inputi = document.getElementById('inputi');
    for(var i=0; i < radios.length; i++){
     if(radios[i].checked)
      inputi.value += radios[i].value+',';
      
    
    }
    
}
*/



function addTag(elemento,numero) {

elemento.style.display='none';
document.getElementById('tag'+numero).style.display='block';
document.getElementById('tags').value+=numero+',';


}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
if(n == 8){
  document.getElementById('tudo').style.display='none';
}
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}


function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
function favoritarPost(elemento,idpost) {

console.log(idpost);
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      console.log(this.responseText);
      document.getElementById("favoritos").innerHTML=this.responseText;
      
         
    }
  }
  xmlhttp.open("GET","favoritar.php?idpost="+idpost,true);
  xmlhttp.send();

</script>

<body class="w3-theme-l5" onload="carregarPosts(0)">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large dw3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     



    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  <?php if ($_SESSION['codUsuarioLogado'] !=""): ?>
     <?php
      $sql_getinfos = "select * from usuarios where idusuario=".$_SESSION['codUsuarioLogado']."";
     
      if($resultado = mysqli_query($conexao,$sql_getinfos)){
        while ($coluna = mysqli_fetch_row($resultado)) {
      echo '<p class="w3-right w3-margin-right"><b>'.$coluna[1].'</b> <img src="http://jdsitespalmas.com/projeto_hackathon/imagensupload/'.$coluna[6].'" class="w3-circle" style="height:35px;width:35px" alt="Avatar"></p> 
          ';
         

        }
      }else{
        $aux = 1;
      }



      ?>
      <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fas fa-power-off"></i></a>

 <?php else: ?>

  <span onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Login">
      Login
    </span>
 <?php endif ?>
 
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
     <!--  <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
        </div>
      </div> -->
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <center><p><i class="fas fa-bullhorn"></i>&nbsp;<b>Veiculação Pública</b></p></center>
          <hr class="w3-clean">
           <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:25px">
          <h5 style="margin-bottom: 1px"> Prefeitura</h5>

          <p style="font-size: 0.9em"><b>Lorem ipsum dolor sit amet</b> - consectetur adipisicing elit... <button class="w3-btn w3-small " style="color:blue;text-decoration: underline;">Ver mais&nbsp;&nbsp;<i class="fas fa-plus-square w3-medium"></i>&nbsp;</button></p>
          <hr class="w3-clean">
           <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:25px">
          <h5 style="margin-bottom: 1px"> Ministério do Trabalho</h5>

          <p style="font-size: 0.9em"><b>Lorem ipsum dolor sit amet</b> - consectetur adipisicing elit... <button class="w3-btn w3-small " style="color:blue;text-decoration: underline;">Ver mais&nbsp;&nbsp;<i class="fas fa-plus-square w3-medium"></i>&nbsp;</button></p>
          <hr class="w3-clean">
          <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:25px">
          <h5 style="margin-bottom: 1px" title="Secretaria Municipal de Saúde">SEMUS</h5>

          <p style="font-size: 0.9em"><b>Lorem ipsum dolor sit amet</b> - consectetur adipisicing elit... <button class="w3-btn w3-small " style="color:blue;text-decoration: underline;">Ver mais&nbsp;&nbsp;<i class="fas fa-plus-square w3-medium"></i>&nbsp;</button></p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m6 ">

      <!-- menuzinho top -->
      <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-col m12">
          
            <div class="w3-card w3-container w3-display-container" style="padding: 0px;border-top-left-radius: 25px;border-top-right-radius: 25px;">
              
              <span class="w3-third w3-white w3-center w3-btn" style="border-top-left-radius: 25px;" onclick="carregarFeed(this)" id="menufeed"><h5><b><i>Feed</i></b></h5></span>
              <span class="w3-third w3-theme-l3 w3-center w3-btn" onclick="carregarFeedMI(this)" id="menumi"><h5><b>Meus Interesses</b></h5></span>
              <span class="w3-third w3-theme-l3 w3-center w3-btn" style="border-top-right-radius: 25px;" onclick="carregarFeedMP(this)" id="menump"><h5><b>Meus Posts</b></h5></span>

            </div>
         
        </div>
      </div>
      

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding w3-display-container">

              <?php 
                if($_SESSION['codUsuarioLogado'] !=""){
                  echo ' <button class="w3-btn w3-theme-d2" onclick="document.getElementById(&#039;divpostar&#039;).style.display=&#039;block&#039;;this.style.display=&#039;none&#039;;" id="botaonp"><i class="fas fa-pencil-alt"></i>&nbsp;Novo Post</button>';
                }else{
                    echo ' <button class="w3-btn w3-theme-d2" onclick="document.getElementById(&#039;id01&#039;).style.display=&#039;block&#039;;" id="botaonp"><i class="fas fa-pencil-alt"></i>&nbsp;Novo Post</button>';
                }

              ?>
             
              <!-- <h6 class="w3-opacity"></h6> -->
              <div id="divpostar" style="display: none;">
              <button class="w3-btn w3-display-topright" onclick="document.getElementById('botaonp').style.display='block';document.getElementById('divpostar').style.display='none';"><i class="fas fa-times"></i></button>
              <br>
              <div class="w3-left" >
             
             <form action="submeterpost.php" method="POST" name="formpost" enctype="multipart/form-data">
             <input type="text" name="titulopost"  style="" placeholder=" Digite o título "><br><br>
              <textarea rows="4" cols="45"  name="corpopost" placeholder=" Digite o texto do post"></textarea>
            <input type="text" name="localpost"  style="" placeholder=" Digite a localização"> <br><br>

           </div>
            <div class="w3-left" style="margin-right: 0.5%">
            <i class="fas fa-image w3-xxlarge"></i>&nbsp;<input type="file" name="arquivo1"><br>
            <input type="hidden" name="tags" id="tags">
            <input type="hidden" name="codautor" id="codautor" value="<?php echo $_SESSION['codUsuarioLogado'];?>">

            


     <?php
      $sql_getinfosform = "select * from usuarios where idusuario=".$_SESSION['codUsuarioLogado']."";
     
      if($resultadoform = mysqli_query($conexao,$sql_getinfosform)){
        while ($colunaform = mysqli_fetch_row($resultadoform)) {
      echo ' <input type="hidden" name="nomeautor" id="nomeautor" value="'.$colunaform[1].'">';
         

        }
      }else{
        $aux = 1;
      }



      ?>
           
           </form>
           <p>Adicionar tags:<br>
            <span class="w3-tag w3-btn w3-medium w3-dark-grey" onclick="addTag(this,1);">#SegurançaPública</span>
            <span class="w3-tag w3-btn w3-medium w3-dark-grey" onclick="addTag(this,2);">#Transporte</span>
            <span class="w3-tag w3-btn w3-medium w3-dark-grey" onclick="addTag(this,3);">#Saúde</span>
            <span class="w3-tag w3-btn w3-medium w3-dark-grey" onclick="addTag(this,4);">#Educação</span>
            <span class="w3-tag w3-btn w3-medium w3-dark-grey" onclick="addTag(this,5);">#ÁguaEnergia</span>
            <span class="w3-tag w3-btn w3-medium w3-dark-grey" onclick="addTag(this,6);">#Ambiental</span>
          
          </p>
          <hr class="w3-clean">
           <p>Tags adic.:<br>
            
            <span class="w3-tag w3-small w3-animate-zoom w3-theme-d5" style="display: none;width: auto;" id="tag1">#SegurançaPública</span>
            <span class="w3-tag w3-small w3-animate-zoom w3-theme-d4" style="display: none;width: auto;" id="tag2">#Transporte</span>
            <span class="w3-tag w3-small w3-animate-zoom w3-theme-d3" style="display: none;width: auto;" id="tag3">#Saúde</span>
            <span class="w3-tag w3-small w3-animate-zoom w3-theme-d2" style="display: none;width: auto;" id="tag4">#Educação</span>
            <span class="w3-tag w3-small w3-animate-zoom w3-theme-d1" style="display: none;width: auto;" id="tag5">#ÁguaEnergia</span>
            <span class="w3-tag w3-small w3-animate-zoom w3-theme" style="display: none;width: auto;" id="tag6">#Ambiental</span>
            

     <?php
      $sql_getinfos = "select * from usuarios where idusuario=".$_SESSION['codUsuarioLogado']."";
     
      if($resultado = mysqli_query($conexao,$sql_getinfos)){
        while ($coluna = mysqli_fetch_row($resultado)) {
       echo '<input type="hidden" name="nomeautor" id="nomeautor" value="'.$coluna[1].'">';      
        }
      }else{
       echo '<input type="hidden" name="nomeautor" id="nomeautor" value="Desconhecido">';
      }

     ?>
                
                 
              
                <br><br><button class="w3-button w3-theme" onclick="document.formpost.submit()"><i class="far fa-check-circle"></i>&nbsp;Postar</button> 
           
              
            </div>
              

              
            </div>
            </div>
          </div>
        </div>
      </div>
      <div id="posts">

      </div>

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
         <span class="w3-right w3-large w3-btn" onclick="favoritarPost(this)"><i class="far fa-star"></i></span>
       
       
        <h5 style="margin-bottom: 1px">João</h5>
         <span class="w3-left w3-opacity">1 min</span><br>
        <hr class="w3-clear" style="margin-top:10px;">
        <p id>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>

        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fas fa-level-up-alt"></i>&nbsp;54</button> 
        
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fas fa-level-down-alt"></i>&nbsp;200</button> 
        <a href="https://api.whatsapp.com/send?phone=5563992356283" class="w3-button w3-green w3-margin-bottom"><i class="fab fa-whatsapp">&nbsp;Grupo Lorem ipsum</i></a>
         
        <div class="w3-right">
          <b><i>Verificação:&nbsp;&nbsp; </i></b>
           <img onmouseover="document.getElementById('descriorg01').style.display= 'block'" onmouseleave="document.getElementById('descriorg01').style.display='none'"   src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-circle" style="width:20px">|
           <img onmouseover="document.getElementById('descriorg02').style.display='block'" onmouseleave="document.getElementById('descriorg02').style.display='none'" src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-circle" style="width:20px">|
           <img onmouseover="document.getElementById('descriorg03').style.display='block'" onmouseleave="document.getElementById('descriorg03').style.display='none'" src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-circle" style="width:20px"><br>
           <span class="w3-tag w3-small w3-white w3-card-4  w3-right" id="descriorg01" style="display: none">#lorem</span>
            <span class="w3-tag w3-small w3-white w3-card-4  w3-right" id="descriorg02" style="display: none">#ipsum</span>
            <span class="w3-tag w3-small w3-white w3-card-4 w3-right" id="descriorg03" style="display: none">#dolor</span>

        </div>
       
        <p>
            <span class="w3-tag w3-small w3-theme-d5">#LOREM</span>
            <span class="w3-tag w3-small w3-theme-d4">#IPSUM</span>
            <span class="w3-tag w3-small w3-theme-d3">#DOLOR</span>
            <span class="w3-tag w3-small w3-theme-d2">#SIT</span>
            <span class="w3-tag w3-small w3-theme-d1">#AMET</span>
            <span class="w3-tag w3-small w3-theme">#CONSECTETUR</span>
          
          </p>
      </div>

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
        <span class="w3-right w3-opacity">1 min</span>
        <h5 style="margin-bottom: 1px">Marcos</h5><br>
        <hr class="w3-clear" style="margin-top:10px;">
        <p id>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Gostei</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> </button> 
      </div>

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
        <span class="w3-right w3-opacity">1 min</span>
        <h5 style="margin-bottom: 1px">Joaquim</h5><br>
        <hr class="w3-clear" style="margin-top:10px;">
        <p id>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="https://www.w3schools.com/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Gostei</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> </button> 
      </div>
      
     <!--  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="/w3images/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">16 min</span>
        <h4>Jane Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>   -->
<!-- 
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">32 min</span>
        <h4>Angie Jane</h4><br>
        <hr class="w3-clear">
        <p>Have you seen this?</p>
        <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>  -->
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column - Favoritos -->
    <div class="w3-col m3">
      <h4 class="w3-center">Favoritos</h4>


   
 <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
  <h3>Você não está logado!</h3>
  <p><span onclick="document.getElementById('id01').style.display='block'">Logue</span> para salvar posts favoritos.</p>
 </div>

    <div id="favoritos">

    
      <!-- Ads -->



    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<div id="id01" class="w3-modal">
  <center>
   
<div class="wrapper" style="display: block;" id="login">

<br><br><br>
  <form method="post" action="login.php" class="login">
     <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright w3-large"> <i class="far fa-times-circle"></i></span>
    <p class="title">Fazer Login</p>
    <input type="text" placeholder="Digite o CPF" name="cpf" autofocus="">
    <i class="fa fa-user"></i>
    <input type="password" placeholder="Senha" name="pass">
    <i class="fa fa-key"></i>
    <span onclick="document.getElementById('id01').style.display='none';document.getElementById('id02').style.display='block';"><a href="#">Fazer cadastro</a></span>
    <button type="submit">
      <i class="spinner"></i>
      <span class="state">Entrar</span>
    </button>
  </form>
  <p></p>
</div>
</center>
</div>


  <div id="id02" class="w3-modal">

  <div class="w3-modal-content" style="width: 380px;height: 468px;">
      
    <div class="w3-container w3-theme-d2">
    <h2>Cadastro</h2>
    <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-button w3-display-topright w3-large"> <i class="far fa-times-circle"></i></span>
  </div>

  <form class="w3-container" action="cadastro.php" method="post" enctype="multipart/form-data">
    <label class="w3-text-teal"><b>Nome</b></label>
    <input class="w3-input w3-border" type="text" name="nome">

    <label class="w3-text-teal"><b>Telefone</b></label>
    <input class="w3-input w3-border" type="text" name="telefone">

    <label class="w3-text-teal"><b>CPF</b></label>
    <input class="w3-input w3-border" type="text" name="cpf">

      <label class="w3-text-teal"><b>Senha</b></label>
    <input class="w3-input w3-border" type="password" name="senha">

  <i class="fas fa-image w3-xxlarge"></i>&nbsp;<input type="file" name="icone"><br>
  <br>
    <button type="submit" class="w3-btn w3-blue-grey">Cadastrar</button>
  </form>


    </div>


  </div>

  <div id="id03" class="w3-modal" style="display: <?php echo $loginerrado; ?>!important;">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright w3-large"> <i class="far fa-times-circle"></i></span>
        <div class="w3-panel w3-red">
        <h3>Login errado!</h3>
        <p>CPF ou senha informados não conferem. Verifique seus dados e tente novamente</p>
      </div> 
      </div>
    </div>
  </div>

  <div id="id04" class="w3-modal" style="display: <?php echo $logincerto; ?>!important;">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-display-topright w3-large"> <i class="far fa-times-circle"></i></span>
        <div class="w3-panel w3-green">
        <h3>Login Correto!</h3>
        <p>Você realizou login com sucesso.</p>
      </div> 
      </div>
    </div>
  </div>

</div>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
 

</body>
</html> 
