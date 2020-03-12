<?php

  // Déclaration d'une nouvelle classe

  class connexionToDB
  {
      private $host    = 'localhost';  // nom de l'host
    private $name    = 'AWS';    // nom de la base de donnée
    private $user    = 'root';       // utilisateur
    private $password    = '';       // mot de passe
    private $connexion;

      public function __construct($host = null, $name = null, $user = null, $password = null)
      {
          if ($host != null) {
              $this->host = $host;
              $this->name = $name;
              $this->user = $user;
              $this->password = $password;
          }

          try {
              $this->connexion = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->name,
            $this->user,
            $this->password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
        );
          } catch (PDOException $e) {
              echo 'Erreur : Impossible de se connecter  à la BDD !';

              die();
          }
      }

      public function connexion()
      {
          return $this->connexion;
      }
  }
  $DB = new connexionToDB;
  $bdd = $DB->connexion();
