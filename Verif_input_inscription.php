<!<?php
//Quand on clique sur le bouton d'inscription on verifie les données pour la sécurité du site
if (isset($_POST['forminscription'])) {
    $Nom_utilisateur=htmlspecialchars($_POST['Nom']); //verifie la non contenance de caracteres spécials javascript
    $Prenom_utilisateur=htmlspecialchars($_POST['prenom']);
    $pseudo=htmlspecialchars($_POST['pseudo']);
    $identifiant=htmlspecialchars($_POST['identifiant']);
    $identifiant2=htmlspecialchars($_POST['identifiant2']);
    $mot_de_passe=sha1($_POST['mot_de_passe']); //hachage du mot de passe
    $mot_de_passe2=sha1($_POST['mot_de_passe2']);

    //on verfifie la taille des données
    //une variable erreur est utilisée afin d'afficher le type d'erreur d'éetectée et de demander a l'utilisateur de courriger
    if (!empty($_POST['Nom']) and !empty($_POST['prenom']) and !empty($_POST['pseudo']) and !empty($_POST['identifiant']) and !empty($_POST['identifiant2']) and !empty($_POST['mot_de_passe']) and !empty($_POST['mot_de_passe2'])) {
        if (strlen($Nom_utilisateur) > 255 and strlen($Prenom_utilisateur) > 255 and
            strlen($identifiant) > 255 and strlen($identifiant2) > 255 and
            strlen($mot_de_passe) > 255 and strlen($mot_de_passe2) > 255) {
            $erreur="Faut pas depasser les 255 caratères.";
    //on verifie la taille du pseudo qui ne doit pas depasser 20 char
        } elseif (strlen($pseudo) > 20) {
            $erreur="Faut pas depasser 20 caractères pour le pseudo.";
    //on verfifie que la confirmation de la boite mail est identique
        } elseif ($identifiant2 != $identifiant) {
            $erreur="boites mail non identiques.";
    //on vérifie qu'on a bien entré une boite mail correcte
        } elseif (!filter_var($identifiant, FILTER_VALIDATE_EMAIL)) {
            $erreur="Entrez une boite e_mail correcte.";
    //on vérifie que le mot de passe de confirmation est identique au mot de passe choisit
        } elseif ($mot_de_passe2 != $mot_de_passe) {
            $erreur="mot de passe non identique.";
        } else { // on verfie que la boite mail n'existe pas déjà dans la base
            $e_mailCount=$bdd->prepare('SELECT * FROM utilisateurs WHERE mail=?');
            $e_mailCount->execute(array($identifiant));
            $e_mailExist=$e_mailCount->rowCount();
          // on verfie que le nom ainsi que le prénom n'existe pas déjà dans la base
            $NomCount=$bdd->prepare('SELECT * FROM utilisateurs WHERE Nom=? AND prenom=? ');
            $NomCount->execute(array($Nom_utilisateur,$Prenom_utilisateur));
            $NomExist=$NomCount->rowCount();
          // on vérifie que le pseudo n'existe pas déjà dans la base
            $pseudoCount=$bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo=? ');
            $pseudoCount->execute(array($pseudo));
            $pseudoExist=$NomCount->rowCount();
          //on test les 3 variables de verification d'existance au préalable des données entrées
            if ($e_mailExist != 0) {
                $erreur="Vous êtes déjà enregistré !";
            } elseif ($pseudoExist != 0) {
                $erreur="Ce pseudo est déjà utilisé choisissez un autre !";
            } elseif ($NomExist != 0) {
                $erreur="Vous êtes déjà enregistré!";
            } else {
              //une fois tout les tests passés on execute la roquette d'insertion de données.
                $insertMembre=$bdd->prepare(' INSERT INTO utilisateurs (id , pseudo, mail, Nom , prenom, password , date_inscription , date_connexion) VALUES ( null,?,?,?,?,?,DATE(NOW()),DATE(NOW())) ');
                $insertMembre->execute(array($pseudo, $identifiant, $Nom_utilisateur, $Prenom_utilisateur, $mot_de_passe ));

              //récupérer l'id de l'utilisateur en cas de besoin
              /*  $SelectId=$bdd->prepare(' SELECT id FROM utilisateurs WHERE Nom LIKE ?  AND prenom LIKE ?');
                $SelectId->execute(array($Nom_utilisateur,$Prenom_utilisateur));
                $ligne=$SelectId->fetch();*/

                $erreur="Votre compte à bien était crée. <a class=\"btn btn-warning\" href=\"connexion.php\">Je me connecte !</a>";
            }
        }
    } else {
        $erreur="Tout les champs doivent être remplis";
    }
}

?>
