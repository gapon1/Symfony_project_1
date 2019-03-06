<?php
namespace AppBundle\Service;

use AppBundle\Entity\Product;

class SerializeProductService
{
    public function serialize(Product $product){
        $arr = [
          'title' => $product->getTitle(),
          'category' => $product->getCategory(),
          'price' => $product->getPrice()
        ];

        return $arr;

    }

}