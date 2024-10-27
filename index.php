<?php 

require __DIR__.'/src/infra/ConnectionDB.php';
require __DIR__.'/src/Model/Product.php';
require __DIR__.'/src/Repository/ProductRepo.php';

$pdo = ConnectionDB::connect($host,$db,$user,$password);

$produtsRepo = new ProductRepository($pdo);
$dataCoffe = $produtsRepo->optionsCoffe();
$dataFood = $produtsRepo->optionsFood();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Mermaid Cafe - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo.png" class="logo" alt="logo-mermaid-cafe">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach($dataCoffe as $product):?>
                <div class="container-produto">
                    <div class="container-foto">
                    <img src="<?= $product->getImagePath()?>">
                    </div>
                    <p><?= $product->getName()?></p>
                    <p><?= $product->getDescription()?></p>
                    <p><?= "R$ " . $product->getPriceFormat()?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach ($dataFood as $food): ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= $food->getImagePath()?>">
                    </div>
                <p><?= $food->getName()?></p>
                <p><?= $food->getDescription()?></p>
                <p><?= "R$ ". $food->getPriceFormat()?></p>
                </div>
                 <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>