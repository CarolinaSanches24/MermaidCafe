#### Example No security 


```php

 <form action="delete-product.php">
      <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
      <input type="submit" class="botao-excluir" value="Excluir">
 </form>
 
$productRepo->deleteProduct($_GET['product_id']);
```