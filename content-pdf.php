<?php

// namespace ContentPdf;

require __DIR__ . '/src/infra/ConnectionDB.php';
require __DIR__ . '/src/Model/Product.php';
require __DIR__ . '/src/Repository/ProductRepo.php';


$pdo = \ConnectionDB::connect($host, $db, $user, $password);

$productRepo  = new \ProductRepository($pdo);
$dataProducts = $productRepo->searchAllProducts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos </title>
    <!-- <link rel="stylesheet" href="css/content.css" /> -->

    <style>
        .container-table {
            display: flex;
            justify-content: center;
            width: 80%;
            margin: 20px auto;
            font-size: 14px;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th {
            background-color: rgb(49, 7, 88);
            color: #fff;
            padding: 12px 8px;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 3px solid #ddd;
        }

        td {
            padding: 10px;
            background-color: #f4f4f9;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) td {
            background-color: #e9e9f3;
        }

        tr:hover td {
            background-color: #dcdce0;
            color: #000;
        }

        table,
        th,
        td {
            border-left: none;
            border-right: none;
        }
    </style>

</head>

<body>
    <section class="container-table">
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Descricão</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataProducts as $product): ?>
                    <tr>
                        <td><?= $product->getName() ?></td>
                        <td><?= $product->getTypeProduct() ?></td>
                        <td><?= $product->getDescription() ?></td>
                        <td><?= $product->getPriceFormat() ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>

</html>