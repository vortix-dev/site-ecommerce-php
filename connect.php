<?php
// Connexion au serveur MySQL
$host = "localhost";
$username = "root";
$password = "";

// Créer une connexion
$con = mysqli_connect($host, $username, $password);

// Vérifier la connexion
if (!$con) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Nom de la base de données
$dbname = "site_ecommerce";

// Requête SQL pour créer la base de données
$sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

// Exécuter la requête
if (mysqli_query($con, $sql)) {
} else {
    die("Erreur lors de la création de la base de données : " . mysqli_error($con));
}

// Sélectionner la base de données
if (!mysqli_select_db($con, $dbname)) {
    die("Erreur lors de la sélection de la base de données : " . mysqli_error($con));
}

// Requêtes pour créer les tables
$createTables = [
   "CREATE TABLE IF NOT EXISTS admins (
        id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
    
    "CREATE TABLE IF NOT EXISTS cart (
        id INT NOT NULL AUTO_INCREMENT,
        p_name VARCHAR(255) NOT NULL,
        price VARCHAR(255) NOT NULL,
        qty INT NOT NULL,
        img VARCHAR(255) NOT NULL,
        user_id INT NOT NULL,
        prod_id INT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
    
    "CREATE TABLE IF NOT EXISTS categories (
        id INT NOT NULL AUTO_INCREMENT,
        cat_name VARCHAR(255) NOT NULL,
        status TINYINT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
    
    "CREATE TABLE IF NOT EXISTS orders (
        id INT NOT NULL AUTO_INCREMENT,
        user_id INT NOT NULL,
        total_price INT NOT NULL,
        product VARCHAR(10000) NOT NULL,
        order_status VARCHAR(255) NOT NULL,
        order_date TIMESTAMP NOT NULL,
        f_name VARCHAR(100) NOT NULL,
        phone VARCHAR(10) NOT NULL,
        wilaya VARCHAR(100) NOT NULL,
        addres VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
    
    "CREATE TABLE IF NOT EXISTS product (
        id INT NOT NULL AUTO_INCREMENT,
        cat_name INT NOT NULL,
        prod_name VARCHAR(255) NOT NULL,
        description VARCHAR(15000) NOT NULL,
        img VARCHAR(255) NOT NULL,
        price FLOAT NOT NULL,
        status TINYINT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
    
    "CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        f_name VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        pass VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
    // Ajoutez ici les requêtes pour créer d'autres tables
];

// Exécuter chaque requête pour créer les tables
foreach ($createTables as $tableQuery) {
    if (mysqli_query($con, $tableQuery)) {
    } else {
        echo "Erreur lors de la création de la table : " . mysqli_error($con) . "<br>";
    }
}

// Fermer la connexion
?>