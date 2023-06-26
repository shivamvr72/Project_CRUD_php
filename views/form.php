
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error; ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<form action="" method="post" enctype="multipart/form-data"> <!-- action="" also indicates same file ; enctype="multiple/form-data" means that by form we going to submit the file --> 
<!-- get = it will show the passing data into url; not secure method to transer or for any data base related operation-->
<!-- post = nothing will show in the url; secure method -->
    
    <?php if ($product['image']): ?>
        <img src="<?php echo $product['image']; ?>" class='update-image'>
    <?php endif ?>
    <div class="mb-3">
        <label>Product Image</label>
        <br>
        <input type="file" name="image">
    </div>

    <div class="mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
    </div>
    
    <div class="mb-3">
        <label>Product Description</label>
        <textarea type="text" name="description" class="form-control"><?php echo $description ?></textarea>
    </div>
    
    <div class="mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
