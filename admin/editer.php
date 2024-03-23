<?php
session_start();

require("../config/commandes.php");

if(!isset($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

if(empty($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

if(!isset($_GET['id'])){
    header("Location: afficher.php");
}

if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
    header("Location: afficher.php");
}

if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $leProduit = afficherUnProduit($id);
    }
}

foreach($_SESSION['xRttpHo0greL39'] as $i){
    $nom = $i->pseudo;
    $email = $i->email;
}

?>

<!DOCTYPE html>
<html leng="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENNEN</title>
    <link rel="icon" href="images/iconfo.svg">
    <link rel="stylesheet" href="style.css">
    <script src="monscript.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>


<div id="slider">
          <img src="images/image.jpg" alt="" id="img">
          <div class="entete_titre">
            <h1>ENNEN</h1>
            Connecté En Tant que <strong>:<?= $nom ?></strong>
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
               <li><a href="../index.php">Accueil</a></li>
               <li><a href="../admin/afficher.php">Produits</a></li>
               <li><a href="../admin/">Ajouter</a></li>
               <li><a href="supprimer.php">Suppression</a></li>

          <li style="float: right ;"><a href="destroy.php" class="active">Deconnection</a></li>
          </ul>
     </div>

    <div class="album py-5 bg-light">
        <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<?php foreach ($leProduit as $produit): ?>
        
    <form method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
        <input type="name" class="form-control" name="image" value="<?= $produit->image ?>" required>

    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
        <input type="text" class="form-control" name="nom" value="<?= $produit->nom ?>"  required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix" value="<?= $produit->prix ?>" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea class="form-control" name="desc" required><?= $produit->description ?></textarea>
    </div>

    <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
    </form>

    <?php endforeach; ?>

</div></div></div>

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

    if(isset($_POST['valider']))
    {
        if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
        {
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
            {
                $image = htmlspecialchars(strip_tags($_POST['image']));
                $nom = htmlspecialchars(strip_tags($_POST['nom']));
                $prix = htmlspecialchars(strip_tags($_POST['prix']));
                $desc = htmlspecialchars(strip_tags($_POST['desc']));
            
                if(isset($_GET['id'])){
    
                    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
                    {
                        $id = $_GET['id'];
                    }
                }

            try 
            {
                modifier($image, $nom, $prix, $desc, $id);
                header('Location: afficher.php');
            } 
            catch (Exception $e) 
            {
                $e->getMessage();
            }

            }
        }
    }

?>