<?php

require __DIR__ . '/src/infra/ConnectionDB.php';
require __DIR__ . '/src/Model/Product.php';
require __DIR__ . '/src/Repository/ProductRepo.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);
$productRepo =  new ProductRepository($pdo);

if (isset($_POST['editProduct'])) {

  $price = str_replace(['R$', '.', ','], ['', '', '.'], $_POST['price']);
  $product = new Product(
    product_id: $_POST['product_id'],
    name: $_POST['name'],
    price: $price,
    description: $_POST['description'],
    type_product: $_POST['type_product'],
    image: null
  );

  $productRepo->uploadImage($_FILES, $product);
  $productRepo->updateProduct($product);

  header("Location:admin.php");
} else {
  $product = $productRepo->searchProduct($_GET['product_id']);
}
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
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Mermaid Café- Editar Produto</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <img src="img/logo.png" class="logo-admin" alt="logo Mermaid Café">
      <h1>Editar Produto</h1>
      <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
      <form method="post" enctype="multipart/form-data">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" value="<?= $product->getName() ?>" required>

        <div class="container-radio">
          <div>
            <label for="coffe">Café</label>
            <input type="radio" id="coffe" name="type_product" value="Café" <?= $product->getTypeProduct() == 'Café' ? "checked" : "" ?>>
          </div>
          <div>
            <label for="lunch">Almoço</label>
            <input type="radio" id="lunch" name="type_product" value="Almoço" <?= $product->getTypeProduct() == 'Almoço' ? "checked" : "" ?>>
          </div>
        </div>

        <label for="description">Descrição</label>
        <input type="text" id="description" name="description" value="<?= $product->getDescription() ?>" required>

        <label for="price">Preço</label>
        <input type="text" id="price" name="price" value="<?= $product->getPriceFormat() ?>" required>

        <label for="image">Envie uma imagem do produto</label>
        <input type="file" name="image" accept="image/*" id="image" placeholder="Envie uma imagem">
        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
        <input type="submit" name="editProduct" class="botao" value="Editar produto" />
      </form>

    </section>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/index.js"></script>

</body>

</html>