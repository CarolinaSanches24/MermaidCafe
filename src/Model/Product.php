<?php

class Product{

    private $product_id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $type_product;

    public function __construct(
        int  $product_id = null,
        string $name, 
        string $description,
        float $price, 
        string $image, 
        string $type_product)
    {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->type_product = $type_product;
    }

    public function getId():int
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
    public function getPrice():float
    {
        return $this->price;
    }
    public function  getImage():string
    {
        return $this->image;
    }
    public function getTypeProduct():string
    {
        return $this->type_product;
    }

    public function getPriceFormat():string
    {
        return  number_format($this->price, 2);
    }
    public function getImagePath():string
    {
        return 'img/'.$this->image;
    }
        
}