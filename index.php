﻿<?php
  if(!empty($_POST)){
    extract($_POST);
   $valid = true;
   if (isset($_POST['envoyer'])){
    $nom = htmlentities(trim($nom)); // On récupère le nom
    $prenom = htmlentities(trim($prenom)); // on récupère le prénom
    $email = htmlentities(strtolower(trim($email))); // On récupère le mail
    $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail

    if(empty($nom)){
      $valid = false;
      $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
   }
   //  Vérification du prénom
   if(empty($prenom)){
      $valid = false;
      $er_prenom = ("Le prenom d' utilisateur ne peut pas être vide");
   }
   // Vérification du mail
   if(empty($mail)){
      $valid = false;
      $er_mail = "Le mail ne peut pas être vide";
   // On vérifit que le mail est dans le bon format
   }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
      $valid = false;
      $er_mail = "Le mail n'est pas valide";

   } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $er_mail = "Le format du mail est invalide";
  }
  //=====Création du header de l'e-mail.
 $header = "From: no-reply@gmail.com\n";
 $header .= "MIME-version: 1.0\n";
 $header .= "Content-type: text/html; charset=utf-8\n";
 $header .= "Content-Transfer-ncoding: 8bit";
 //=======

 //=====Ajout du message au format HTML          
 $contenu = '<p>Bonjour ' . $nom . ',</p><br>
   	<p>Nous avons bien recu votre message. Nous vous repondrons d\'ici peu <p>';

 mail($mail, 'Accuse de reception', $contenu, $header);
 header('Location: index.php');
 exit;
   }

  }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UFEC PAGE WEB</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
     <link rel="stylesheet" href="css/styles.css" />
</head>


<body>

    <div class="nav">
        <a class="logo" href="#">
            <img src="image/agenceilog.jepg">
        </a>

        <div class="navbar-toggler" typeof="button" id="bar">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>

        </div>
        <div class="menu-bar" id="navbar">
            <ul class="menu-items">
                <li> <a href="apropos.html">A propos</a></li>
                <li> <a href="noservices.html">Nos services</a></li>
                <li> <a href="contacter.html">Nous conctacter</a></li>
            </ul>
        </div>

        <div class="navbar-social">
            <span>ABONNEZ VOUS</span>
            <ul>
                <li> <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li> <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </ul>
        </div>

    </div>
    <div class="form">
        <h1 class="text-dark title-form">
            Nous contacter
        </h1>
        <form method="post">
        <?php // S'il y a une erreur sur le nom alors on affiche
             if (isset($er_nom)){
                 ?>
                 <div><?= $er_nom ?></div>
              <?php }?>
            <div class="form-group">
                <label class="text-secondary" for="exampleFormControlInput1">Nom<span id="start-name">*</span></label>
                <input type="text" name="nom" class="form-control name-class" id="exampleFormControlInput1" value="<?php if(isset($nom)){ echo $nom; }?>" required>
              </div>
            <div class="form-group">
                <label class="text-secondary " for="exampleFormControlInput1">Prenoms<span id="start-fisrt-name">*</span></label>
                <input type="text" name="prenom" class="form-control first-name-class" id="exampleFormControlInput1" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>
            </div>
            <div class="form-group">
              <label  class="text-secondary " for="exampleFormControlInput1">E-mail<span id="start-mail">*</span></label>
              <input type="email" name="email" class="form-control mail-class" id="exampleFormControlInput1" value="<?php if(isset($email)){ echo $email; }?>" required>
            </div>
            <div class="form-group">
              <label class="text-secondary" for="exampleFormControlTextarea1">Message<?php if(isset($nom)){ echo '';}else{echo '*';}?></label>
              <textarea class="form-control" name="mail" id="exampleFormControlTextarea1" rows="3" value="<?php if(isset($mail)){ echo $mail; }?>" required></textarea>
            </div>
            <button type="submit" name="annuler" class="btn btn-dark mb-2 font-weight-bold rounded-pill ">Annuler</button>
            <button type="submit" name="envoyer" class="btn btn-primary mb-2 font-weight-bold rounded-pill">Envoyer</button>
        </form>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="Script1.js"></script>
</body>
</html>