<?php
session_start();

if(!isset($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

if(empty($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

require("../config/commandes.php");

$produits = afficher();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
          <li><a href="../index.html">Accueil</a></li>
               <li><a href="../index.php">Article</a></li>
               <li><a href="../admin/">Ajouter</a></li>
               <li><a href="supprimer.php">Suppression</a></li>

          <li style="float: right ;"><a href="destroy.php" class="active">Deconnection</a></li>
          </ul>
     </div>

<div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">nom</th>
                <th scope="col">prix</th>
                <th scope="col">Description</th>
                <th scope="col">Editer</th>
                </tr>
            </thead>
            <tbody>
<?php foreach($produits as $produit): ?>
                <tr>
                <th scope="row"><?= $produit->id ?></th>
                <td>
                <img src="<?= $produit->image ?>" style="width: 15%">
                </td>
                <td><?= $produit->nom ?></td>
                <td style="font-weight: bold; color: green;"><?= $produit->prix ?>€</td>
                <td><?= substr($produit->description, 0, 100); ?>...</td>
                <td><a href="editer.php?id=<?= $produit->id ?>"><i class="fa fa-pencil" style="font-size: 30px;"></i></a></td>
                </tr>      
<?php endforeach; ?>

            </tbody>
            </table>
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


?>