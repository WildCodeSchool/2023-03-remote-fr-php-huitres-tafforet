<?php

namespace App\Controller;

use App\Model\ProductManager;
use App\Model\FileManager;

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
        $fileManager = new FileManager();
        return $this->twig->render('Admin/Product/edit.html.twig', [
            'product' => $product,
            'files' => $fileManager->selectAllByproductId($id),
            'errors' => $errors
        ]);
    }

    public function delete(int $id): void
    {
        $productManager = new ProductManager();
        $productManager->delete((int)$id);

        header('Location:/product/index');
    }
    public function addFiles()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadsDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir);
            }
            $productId = $_POST['product_id'];
            $fileManager = new FileManager();
            foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
                $fileName = $_FILES['files']['name'][$index];
                if (move_uploaded_file($tmpName, $uploadsDir . $fileName)) {
                    $fileManager->insertProduct($fileName, $productId);
                }
            }
            header('Location: /product/edit?id=' . $productId);
        }
    }
    public function deleteFile(int $id)
    {
        $fileManager = new FileManager();
        $file = $fileManager->selectOneById($id);
        if (unlink(__DIR__ . '/../../public/uploads/' . $file['name'])) {
            $fileManager->delete($id);
        }
        header('Location: /product/edit?id=' . $file['product_id']);
    }
}
