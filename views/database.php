<?php 
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=product_crud', 'root', ''); //dbtype=mysql; from where host = localhost; port = 3306 is default port for mysql; database_name dbname="name"; password of mysql basically it's root by dafault; password for windows here we left empty
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //if any error occurs throw this exeption 

    return $pdo;

?>