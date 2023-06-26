<?php 
 // including database connection
/** @var $pdo \PDO */
require_once "../../views/database.php";


$id = $_POST['id'] ?? null;

if(!$id){
    header('Location : Product_CRUD2.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header("Location: Product_CRUD2.php");
