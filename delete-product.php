<?php 

require __DIR__ . '/src/infra/ConnectionDB.php';
require __DIR__ . '/src/Model/Product.php';
require __DIR__ . '/src/Repository/ProductRepo.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);

$productRepo =  new ProductRepository($pdo);
$productRepo->deleteProduct($_GET['product_id']);

