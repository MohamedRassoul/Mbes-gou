<?php
 session_start();

include "config/commandes.php";

 if(isset($_SESSION['userxXJppk45hPGu']))
 {
     if(!empty($_SESSION['userxXJppk45hPGu']))
     {
         header("Location: client/");
     }
 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ENNEN</title>
    <link rel="icon" href="images/iconfo.svg">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
               <li><a href="index.html">Accueil</a></li>
               <li><a href="index.php"><Article></a></li>
               <li><a href="">Contact</a></li>
               <li><a href="" > À Propos</a></li>
          <li style="float: right ;"><a href="login.php" class="active">Connexion</a></li>
          </ul>
     </div>

<br>
<br>
<br>
<br>

<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">

        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="name" name="nom" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="name" name="prenom" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control" style="width: 350%;">
            </div>
            <br>
            <input type="submit" name="envoyer" class="btn btn-info" value="Envoyer">
        </form>

        </div>
    </div>
</div>

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

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prenom = htmlspecialchars(strip_tags($_POST['prenom']));

        $user = ajouterUser($nom, $prenom, $email, $motdepasse);

        if($user){
            $_SESSION['userxXJppk45hPGu'] = $user;
            header('Location: index.php');
        }else{
            echo "Compte non créer !";
        }
    }

}

?>