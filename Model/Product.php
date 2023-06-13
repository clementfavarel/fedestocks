<?php

class Product
{
    private $identifiant;
    private $nom;
    private $quantite;
    private $fait_le;
    private $fait_a;
    private $par_utilisateur;

    // methods
    public function __construct($identifiant, $nom, $quantite, $fait_le, $fait_a, $par_utilisateur)
    {
        $this->identifiant = $identifiant;
        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->fait_le = $fait_le;
        $this->fait_a = $fait_a;
        $this->par_utilisateur = $par_utilisateur;
    }

    // getters
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function getFaitLe()
    {
        return $this->fait_le;
    }

    public function getFaitA()
    {
        return $this->fait_a;
    }

    public function getParUtilisateur()
    {
        return $this->par_utilisateur;
    }

    // setters
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function setFaitLe($fait_le)
    {
        $this->fait_le = $fait_le;
    }

    public function setFaitA($fait_a)
    {
        $this->fait_a = $fait_a;
    }

    public function setParUtilisateur($par_utilisateur)
    {
        $this->par_utilisateur = $par_utilisateur;
    }
}
