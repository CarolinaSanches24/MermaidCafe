<?php

class Product
{
    public function __construct(
        private ?int  $product_id,
        private string $name,
        private string $description,
        private float $price,
        private ?string $image,
        private string $type_product
    ) {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->type_product = $type_product;
    }

    public function getId(): int |null
    {
        return $this->product_id;
    }

    public  function getName(): string
    {
        return $this->name;
    }
    public  function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function  getImage(): string |null
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {

        $this->image = $image;
    }

    public function getTypeProduct(): string
    {
        return $this->type_product;
    }

    public function getPriceFormat(): string
    {
        return  number_format($this->price, 2);
    }
    public function getImagePath(): string 
    {
        return 'img/' . $this->image;
    }
}
