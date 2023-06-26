<?php 
    // including database connection
    /** @var $pdo \PDO */
    require_once "../../views/database.php";
    // including radom string generating function for images
    require_once "../../views/function.php";
    
    $errors = [];
    
    $title = '';
    $price = '';
    $description = '';
    $product = [
        'image' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        require_once "../../views/validation.php";

        if(empty($errors)){    

            $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                            VALUES (:title, :image, :description, :price, :date);"); // when we get data from user and put into database then we should use prepare statement


            $statement->bindValue(':title', $title); 
            $statement->bindValue(':image', $imagepath); 
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', date('Y-m-d H-i-s'));
            $statement->execute();
            header('Location: Product_CRUD2.php');

            $title = '';
            $price = '';
            $description  = '';
        }
    }


    
?>

    <!-- including header -->
    <?php include_once "../../views/parcials/header.php" ?>

    <p>
        <a href="Product_CRUD2.php" class='btn btn-secondary'>GO Back To Product</a>
    </p>
    <h1>Create New Prpduct</h1>
    
    <!-- including form -->
    <?php include_once "../../views/form.php" ?>
    
    
  </body>
</html>