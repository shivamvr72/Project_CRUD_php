<?php 
    // two ways to make connection to the databasae
    // pdo and MySQLi
    // pdo is more recommended bcz it's support multiple database, oops and many more

    // including database connection
    /** @var $pdo \PDO */  #this says varable $pdo is belongs to class \PDO; we should do because we db from other file and below $pdo variable have chances to be seen as undeclared
    require_once "../../views/database.php";


    $search = $_GET['search'] ?? '';
    if($search) {
        $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
        $statement->bindValue(':title', "%%$search%");
    }else{
        $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC'); //mysql query to fatch the data
    }
    $statement->execute(); //execute the sql query above
    $products = $statement->fetchAll(PDO::FETCH_ASSOC); //how to we give method FETCH_ASSOC means fetch as in style of an accoative array
    
    // echo '<pre>';
    // var_dump($products);
    // echo '</pre>';
    

?>

<!-- including header -->
<?php include_once "../../views/parcials/header.php" ?>

    <h1>Product Catalog</h1>

    <p>
        <a href="create.php" class="btn btn-success">Create Product</a>
    </p>

    <form>     
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for product" vlaue="<?php echo $search ?>" name="search">
            <div class='input-group-append'>
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
            foreach ($products as $i => $product) { ?>
            
            <tr>
            <th scope="row"><?php echo $i+1 ?></th>
            <td>
                <img src="<?php echo $product['image'] ?>" class="thumb-image">
            </td>
            <td><?php echo $product['title'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['create_date'] ?></td>
            <td>
                <a href="update2.php?id=<?php echo $product['id']?>" class="btn btn-sm btn-outline-primary">Edit</a>

                <form style="display: inline-block;" action="delete2.php" method="post">

                    <!-- <?php echo $product['id'] ?> -->
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

                </form>

            </td>
            </tr>

        <?php }  /*or <?php endforeach; ?>*/ ?> 

        
        </tbody>
    </table>
    
  </body>
</html>