<?php
include_once('Model/ConnectDb.php');
include_once('User.php');
include_once('Product.php');

class Model
{
    public function getConn()
    {
        return ConnectDb::getInstance()->getConnection();
    }

    // routes
    public function home()
    {
        include 'View/home.php';
    }

    public function users()
    {
        $users = $this->getAllUsers();
        include 'View/users.php';
    }

    public function products()
    {
        $products = $this->getAllProducts();
        include 'View/products.php';
    }

    public function login()
    {
        include 'View/login.php';
    }

    public function register()
    {
        include 'View/register.php';
    }

    // users
    public function getAllUsers()
    {
        $sql = 'SELECT * FROM utilisateur';
        $stmt = ConnectDb::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getUserFirstnameById($identifiant)
    {
        $sql = 'SELECT prenom FROM utilisateur WHERE identifiant = :identifiant';
        $stmt = ConnectDb::getInstance()->getConnection()->prepare($sql);
        $stmt->bindValue(':identifiant', $identifiant);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['prenom'];
    }

    // products
    public function getAllProducts()
    {
        $sql = 'SELECT * FROM produit';
        $stmt = ConnectDb::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
