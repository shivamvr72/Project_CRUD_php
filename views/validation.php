<?php 
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    if (!$title) {
        $errors[] = 'Product Title is required';
    }
    if (!$price) {
        $errors[] = "price is required";
    }
    // $pdo->exec("INSERT INTO products (title, image, description, price, create_date)
    //             VALUES ('$title', '', '$description', $price, '$date')
    // "); // we should not use this approach of concatinating variables like this because it may manupalate or have big danger of sql injection

    // this is the secure method insted of directly using variable we bind with created copy elements in the VALUES and bind by using the bindValue() with use of $statement variable

    if (!is_dir('images')){
        mkdir('images');
    }

    if(empty($errors)){

        $image = $_FILES['image'] ?? null;
        $imagepath = $product['image']; 


        if ($image && $image['tmp_name']){
            
            if($product['image']){
                unlink($product['image']);
            }
            $imagepath = 'images/'.randomString(8).'/'.$image['name'];
            mkdir(dirname($imagepath));
            move_uploaded_file($image['tmp_name'], $imagepath);
        }

    }


?>