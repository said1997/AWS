<!<?php

if (isset($_POST['identifiant'])) {
    $identifiant=htmlspecialchars($_POST['identifiant']);
    $mot_de_passe=sha1($_POST['mot_de_passe']);

    if (!empty($_POST['identifiant']) and !empty($_POST['mot_de_passe'])) {
        if (strlen($identifiant) > 255 and strlen($mot_de_passe) > 255) {
            $erreur="Les champs doivent contenir moins de 255 caractères!";
        } elseif (!filter_var($identifiant, FILTER_VALIDATE_EMAIL)) {
            $erreur="Entrez une boite e_mail correcte.";
        } else {
            $e_mailCount=$bdd->prepare('SELECT * FROM utilisateurs WHERE mail=?');
            $e_mailCount->execute(array($identifiant));
            $e_mailExist=$e_mailCount->rowCount();

            $PassCount=$bdd->prepare('SELECT * FROM utilisateurs WHERE mail=? AND password=? ');
            $PassCount->execute(array($identifiant,$mot_de_passe));
            $PassExist=$PassCount->rowCount();

            if (!$e_mailExist == 1) {
                $erreur="e_mail incorrecte";
            } elseif (!$PassExist == 1) {
                $erreur="mot de passe incorrecte";
            } else {
                $userInfo=$e_mailCount->fetch();
                $_SESSION['id']=$userInfo['id'];
                $_SESSION['mail']=$userInfo['mail'];

                $user=$bdd->prepare('SELECT * FROM utilisateurs WHERE id=? ');
                $user->execute(array($userInfo['ID_Client']));
                $user=$user->fetch();
                $_SESSION['Nom']=$user['Nom'];
                $_SESSION['prenom']=$user['prenom'];
                header("Location: accueil.html?id=".$_SESSION['id']);
            }
        }
    } else {
        $erreur="Renseignez tout les Champs !";
    }
}

 ?>
