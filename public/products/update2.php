<?php 

// including database connection
/** @var $pdo \PDO */
require_once "../../views/database.php";
 // including radom string generating function for images
require_once "../../views/function.php";


$id = $_GET['id'] ?? null;

if(!$id){
    header('Location : Product_CRUD2.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);


$errors = [];

$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    // validating code
    require_once "../../views/validation.php";

    if(empty($errors)){
        
        
        $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");
        $statement->bindValue(':title', $title); 
        $statement->bindValue(':image', $imagepath); 
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);
        $statement->execute();
        header('Location: Product_CRUD2.php');

    }
}
?>

<!-- including header -->
<?php include_once "../../views/parcials/header.php" ?>

    
<p>
    <a href="Product_CRUD2.php" class='btn btn-secondary'>GO Back To Product</a>
</p>
<h1>Update Product <b><?php echo $product['title'] ?></b></h1>

<!-- including form -->
<?php include_once "../../views/form.php" ?>
  
</body>
</html>