<!<?php
session_start();
include_once("connexionToDB.php");
include_once("Verif_input_connexion.php");
?>


<!Doctype html>
<html>
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
     <link href="CSS/inscription.css" rel="stylesheet" id="bootstrap-css">
     <link href="CSS/connexion.css" rel="stylesheet" id="bootstrap-css">
     <title>Page de connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 <div class="container2">
 <!---heading---->
 <form method="POST" action=" ">
     <header class="heading">Connexion au jeu de damme</header><hr></hr>
    <!---Form starting---->
    <div class="row ">


          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">E_mail :</label></div>
                  <div class="col-xs-7">
                         <input type="text" name="identifiant" id="password" placeholder="Entrez votre mail" class="form-control" value="<?php if (isset($identifiant)) {
    echo $identifiant;
}  ?>">
                 </div>
          </div>
          </div>

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Entrez un mot de passe :</label></div>
                  <div class="col-xs-7">
                         <input type="password" name="mot_de_passe" id="password" placeholder="Entrez un mot de passe" class="form-control">
                 </div>
          </div>
          </div>

           <div >
                        <input class="btn btn-warning" type="submit" name="forminscription" value="Se connecter" />

           </div>

     </div>
     <a href="inscription.php" id="sinscrire">Je m'inscris !</a>
</form>


     <?php

                    if (isset($erreur)) {
                        echo '<div class="btn btn-warning2" > ' .$erreur .    '</div>'    ;
                    }

                 ?>


</div>

</body>
</html>
