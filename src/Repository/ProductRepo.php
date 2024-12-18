<?php

class ProductRepository
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function mapToProduct(array $data): Product
    {
        return new Product(
            product_id: $data['id'],
            name: $data['name'],
            price: $data['price'],
            description: $data['description'],
            image: $data['image'],
            type_product: $data['type_product']
        );
    }

    public function optionsCoffe(): array
    {
        $sql1 = "SELECT * FROM products WHERE type_product='Café' ORDER BY price";
        $stm = $this->pdo->query($sql1);

        $productsCoffe = $stm->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'mapToProduct'], $productsCoffe);
    }

    public function optionsFood(): array
    {
        $sql2 = "SELECT * FROM products WHERE type_product='Almoço' ORDER BY price";

        $stm = $this->pdo->query($sql2);
        $productsFood = $stm->fetchAll(PDO::FETCH_ASSOC);

       return array_map([$this, 'mapToProduct'], $productsFood);
    }

    public function searchAllProducts()
    {
        $sql = "SELECT * FROM products ORDER BY price";
        $stm = $this->pdo->query($sql);
        $listProducts = $stm->fetchAll(PDO::FETCH_ASSOC);

      return  array_map([$this, 'mapToProduct'], $listProducts);
    }

    public function deleteProduct(int $product_id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1,$product_id);
        $stm->execute();
    }

    public function saveProduct(Product $product)
    {
        $sql = "INSERT INTO products (name, price, description, image, type_product)
        VALUES  (:name, :price, :description, :image, :type_product)";

        $stm =  $this->pdo->prepare($sql);
        
        $stm->execute([
            ':name' => $product->getName(),
            ':price' => $product->getPrice(),
            ':description' => $product->getDescription(),
            ':image' => $product->getImage(),
            ':type_product' => $product->getTypeProduct()
        ]);
    }

    public function searchProduct(int $product_id)
    {
        $sql = "SELECT * FROM products WHERE  id = ?";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1, $product_id);
        $stm->execute();

        $dataProduct = $stm->fetch(PDO::FETCH_ASSOC);

        return $dataProduct ? $this->mapToProduct($dataProduct) : null;
    }

    public function updateProduct(Product $product)
    {
       
        $sql = "UPDATE products SET 
        name= :name, 
        price = :price, 
        description= :description,
        type_product= :type_product
        WHERE id = :id";

        $stm = $this->pdo->prepare($sql);
        
        $stm->execute([
            ':name' => $product->getName(),
            ':price' => $product->getPrice(),
            ':description' => $product->getDescription(),
            ':type_product' => $product->getTypeProduct(),
            ':id' => $product->getId() 
        ]);

        if($product->getImage() !== null){
            
            $this->updateImage($product);
        }
    }

    public function updateImage (Product $product)
    {
        $sql = "UPDATE products SET image = :image WHERE id = :id";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([
            ':image' => $product->getImage(),
            ':id' => $product->getId()
        ]);

    }

    public function uploadImage(array $image, Product $product){
        if (isset($image['image']) && $image['image']['error'] === UPLOAD_ERR_OK) {
            // Gera um nome único para o arquivo
            $imageName = uniqid('product_' . $product->getId() . '_') . '.' . pathinfo($image['image']['name'], PATHINFO_EXTENSION);
            
            $product->setImage($imageName);
            
            $uploadPath = $product->getImagePath();

            if (move_uploaded_file($image['image']['tmp_name'], $uploadPath)) {
                return true;  // Sucesso no upload
            }
        }
        return false;  // Falha no upload ou nenhuma imagem enviada
    }
}
