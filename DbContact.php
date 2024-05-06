<?php
class DbConnect {
    private $host = 'localhost'; // Votre hôte MySQL
    private $dbName = 'DevoirPhp'; // Le nom de votre base de données
    private $username = 'root'; // Votre nom d'utilisateur MySQL
    private $password = ''; // Votre mot de passe MySQL

    // Méthode pour se connecter à la base de données
    public function connect() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return null;
        }
    }
}
?>