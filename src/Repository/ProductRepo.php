<?php

class ProductRepository
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function optionsCoffe(): array
    {
        $sql1 = "SELECT * FROM products WHERE type_product='Café' ORDER BY price";
        $stm = $this->pdo->query($sql1);

        $productsCoffe = $stm->fetchAll(PDO::FETCH_ASSOC);

        $dataCoffe = array_map(function ($item) {
            return new Product(
                name: $item['name'],
                price: $item['price'],
                description: $item['description'],
                image: $item['image'],
                type_product: $item['type_product']
            );
        }, $productsCoffe);

        return $dataCoffe;
    }

    public function optionsFood(): array
    {
        $sql2 = "SELECT * FROM products WHERE type_product='Almoço' ORDER BY price";

        $stm = $this->pdo->query($sql2);
        $productsFood = $stm->fetchAll(PDO::FETCH_ASSOC);

        $dataFood = array_map(function ($item) {
            return new Product(
                name: $item['name'],
                price: $item['price'],
                description: $item['description'],
                image: $item['image'],
                type_product: $item['type_product']
            );
        }, $productsFood);
        
        return $dataFood;
    }
}
