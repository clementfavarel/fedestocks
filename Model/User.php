<?php

class User
{
    // variables
    private $identifiant;
    private $prenom;
    private $nom;
    private $email;
    private $mot_de_passe;

    // methods
    public function __construct($identifiant, $prenom, $nom, $email, $mot_de_passe)
    {
        $this->identifiant = $identifiant;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }

    public static function create($prenom, $nom, $email, $mot_de_passe)
    {
        $sql = "INSERT INTO utilisateur (prenom, nom, email, mot_de_passe) VALUES ('$prenom', '$nom', '$email', '$mot_de_passe')";
        $stmt = ConnectDb::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // getters
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    public static function getUserByEmail($email)
    {
        $sql = "SELECT * FROM utilisateur WHERE email = '$email'";
        $stmt = ConnectDb::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // setters
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }
}
