<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENNEN - ImageUpload</title>
    <link rel="icon" href="images/iconfo.svg">
    <link rel="stylesheet" href="style.css">
    <script src="monscript.js" type="text/javascript"></script>
</head>
<body>
<div id="slider">
          <img src="images/image.jpg" alt="" id="img">
          <div class="entete_titre">
            <h1>ENNEN</h1>
            Pour <strong>Vous</strong> Servir
            <div id="réseau_sociaux">
               <img src="images/tweter.svg" class="sociaux">
               <img src="images/facebook.svg" class="sociaux">
               <img src="images/instegram.svg" class="sociaux">
               <img src="images/lindin.svg" class="sociaux">
            </div>
          </div>
          <div id="btn_left"><img src="images/droit.svg" class="left" onclick="slider(-1);"></div>
          <div id="btn_right"><img src="images/gauche.svg" class="right" onclick="slider(+1);"></div>
     </div>
     <!--------------ici notre menu-------------->
     <div id="menu">
          <ul>
               <li><a href="index.php">Accueil</a></li>
               <li><a href="inscription.php">Inscription</a></li>
               <li><a href="produit.php">Produits</a></li>
               <li><a href="">Nous Contactez</a></li>
               <li><a href="Information.html" > information</a></li>

          <li style="float: right ;"><a href="login.php" class="active">Connexion</a></li>
          </ul>
     </div>
	 <br>
	 <br>
	 <br>

	<form method="post" enctype="multipart/form-data" style="zoom: 180%">
		<label>Username</label>
		<input type="text" name="username">
		<br>
		<label>UploadImage</label>
		<input type="file" name='myfile'>
		<br/>
		<input type="submit" name="upload" value="Envoyer">
	</form>
	<br>
	<br>
	<br>

	<!--------------ici formulaire newsletter-------------->
	<div class="inscription_boite">
          <h2> Abonnez vous à notre liste de diffusion </h2>
          <form class="inscription">
               <input type="email" placeholder="exemple@exemple.com" required autocomplete="off">
               <button type="submit"> <span>Inscription</span> </button>
          </form>
     </div>
     <div class="footer">
          <h2>ENNEN est là pour vous</h2>
          <img src="images/tweter.svg" class="sociau">
          <img src="images/facebook.svg" class="sociau">
          <img src="images/instegram.svg" class="sociau">
          <img src="images/whatsapp.svg" class="sociau">
          <img src="images/lindin.svg" class="sociau">
     </div>

</body>
</html>

<?php

if(isset($_POST['upload'])){

	$user=$_POST['username'];
	$image=$_FILES['myfile'];

	echo "Hello $user <br/>";
	echo "File Name<b>::</b> ".$image['name'];

	move_uploaded_file($image['tmp_name'],"img/".$image['name']);

    
}

?>