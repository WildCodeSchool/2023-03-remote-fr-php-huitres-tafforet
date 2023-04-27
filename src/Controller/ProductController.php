<?php

namespace App\Controller;

use App\Model\ProductManager;

class ProductController extends AbstractController
{
    public function index()
    {
        $productManager = new ProductManager();
        $products = $productManager->selectAll('name');

        return $this->twig->render('Product/product.html.twig', ['products' => $products]);
    }
}
