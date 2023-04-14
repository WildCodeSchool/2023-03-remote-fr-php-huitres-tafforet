<?php

namespace App\Controller;

class ProductController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Product/product.html.twig');
    }
}
