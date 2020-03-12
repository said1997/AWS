<?php
//Pour se connecter a la base
  include_once("connexionToDB.php");
  include_once("Verif_input_inscription.php");
?>




<!Doctype html>
<html>
  <head>
     <meta charset="UTF-8">
     <title>Formulaire d'inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link href="CSS/inscription.css" rel="stylesheet" id="bootstrap-css">

  </head>
  <body>
    <div class="container">
      <!---heading---->
      <form method="POST" action=" ">
        <header class="heading"> Formulaire d'inscription</header><hr></hr>
        <!---Form starting---->
        <div class="row ">
     <!--- Pour le Nom---->
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="firstname">Nom :</label> </div>
                 <div class="col-xs-8">
                     <input type="text" name="Nom" id="Nom" placeholder="Entrez votre nom" class="form-control " value="<?php if (isset($Nom_utilisateur)) {
    echo $Nom_utilisateur;
}  ?>" />
             </div>
              </div>
         </div>

     <!--- Pour le Prenom---->
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Prénom :</label></div>
                <div class ="col-xs-8">
                     <input type="text" name="prenom" id="lname" placeholder="Entez Votre Prénom" class="form-control last" value="<?php if (isset($Prenom_utilisateur)) {
    echo $Prenom_utilisateur;
}  ?>" />
                </div>
             </div>
         </div>
     <!-----Pour le pseudo---->
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="mail" >Pseudo :</label></div>
                 <div class="col-xs-8"  >
                      <input type="text" name="pseudo"  id="email"placeholder="Entrez votre pseudo" class="form-control" value="<?php if (isset($pseudo)) {
    echo $pseudo;
}  ?>" >
                 </div>
             </div>
         </div>
     <!-----Pour le mail ainsi que la confirmation---->

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">E_mail :</label></div>
                  <div class="col-xs-8">
                         <input type="text" name="identifiant" id="password" placeholder="Entrez votre mail" class="form-control" value="<?php if (isset($identifiant)) {
    echo $identifiant;
}  ?>">
                 </div>
          </div>
          </div>

           <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">E_mail confirmation :</label></div>
                  <div class="col-xs-8">
                         <input type="text" name="identifiant2" id="password" placeholder="Confirmez votre mail" class="form-control" value="<?php if (isset($identifiant2)) {
    echo $identifiant2;
}  ?>">
                 </div>
          </div>
          </div>
<!-----Pour le mot de passe et la confirmation---->
          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Entrez un mot de passe :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mot_de_passe" id="password" placeholder="Entrez un mot de passe" class="form-control">
                 </div>
          </div>
          </div>

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Confirmez votre mot de passe :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mot_de_passe2" id="password" placeholder="Confirmez mot de passe" class="form-control">
                 </div>
          </div>
          </div>
<!-----Pour le sexe de l'utilisateur---->
         <div class="col-sm-12">
             <div class ="row">
                 <div class="col-xs-4 ">
                   <label class="gender">Sexe:</label>
                 </div>

                 <div class="col-xs-4 male">
                     <input type="radio" name="gender"  id="gender" value="boy">Homme</input>
                 </div>

                 <div class="col-xs-4 female">
                     <input type="radio"  name="gender" id="gender" value="girl" >Femme</input>
                 </div>

             </div>
  <!-----Pour le bouton d'enregistrement---->
             <div class="col-sm-12">
                 <div class="btn btn-warning">
                        <input class="btn btn-warning" type="submit" name="forminscription" value="S'inscrire" />
                 </div>
           </div>
         </div>
     </div>
</form>
     <?php
                //On affiche le message d'erreur si il est détecté
                    if (isset($erreur)) {
                        echo '<div class="btn btn-warning2" > ' .$erreur .    '</div>'    ;
                    }

                 ?>


</div>

</body>
</html>
