<?php

namespace App\Controller;

use App\Model\ProductManager;

class AdminProductController extends AbstractController
{
    public function index(): string
    {
        $productsManager = new productManager();
        $products = $productsManager->selectAll();

        return $this->twig->render('Admin/product/index.html.twig', [
            'products' => $products,
        ]);
    }

    public function add(): ?string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $product = array_map('trim', $_POST);
            // TODO validations (length, format...)
            if (empty($product['name'])) {
                $errors[] = 'Le champ nom est vide.';
            }
            if (empty($product['description']) || strlen($product['description']) < 10) {
                $errors[] = 'Le champ description doit être completé et faire plus de 10 caractères.';
            }
            if (empty($product['information']) || strlen($product['information']) < 10) {
                $errors[] = 'Le champ information doit être completé et faire plus de 10 caractères.';
            }
            // if validation is ok, insert and redirection
            if (empty($errors)) {
                $productManager = new ProductManager();
                $product = $productManager->insert($product);

                header('Location:/product/index');
                return null;
            }
        }

        return $this->twig->render('Admin/product/add.html.twig', [
            'errors' => $errors]);
    }

    public function edit(int $id): ?string
    {
        $productManager = new ProductManager();
        $product = $productManager->selectOneById($id);
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $product = array_map('trim', $_POST);

            // TODO validations (length, format...)
            if (empty($product['name'])) {
                $errors[] = 'Le champ nom est vide.';
            }
            if (empty($product['description']) || strlen($product['description']) < 10) {
                $errors[] = 'Le champ description doit être completé et faire plus de 10 caractères.';
            }
            if (empty($product['information']) || strlen($product['information']) < 10) {
                $errors[] = 'Le champ information doit être completé et faire plus de 10 caractères.';
            }
            // if validation is ok, update and redirection
            if (empty($errors)) {
                $productManager->update($product);

                header('Location: /product/index');

                // we are redirecting so we don't want any content rendered
                return null;
            }
        }

        return $this->twig->render('Admin/Product/edit.html.twig', [
            'product' => $product,
            'errors' => $errors
        ]);
    }

    public function delete(int $id): void
    {
        $productManager = new ProductManager();
        $productManager->delete((int)$id);

        header('Location:/product/index');
    }
}
