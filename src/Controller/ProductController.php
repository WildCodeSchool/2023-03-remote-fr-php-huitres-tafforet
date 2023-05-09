<?php

namespace App\Controller;

use App\Model\FormManager;
use App\Model\ProductManager;

class ProductController extends AbstractController
{
    public function index()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $form = array_map(function ($value) {
                return is_string($value) ? trim($value) : $value;
            }, $_POST);
            $form['delivery'] = isset($form['delivery']) && $form['delivery'] === 'oui';

            // TODO validations (length, format...)
            $this->validateMessage($form, $errors);
            // if validation is ok, insert and redirection
            if (empty($errors)) {
                $formManager = new FormManager();
                $devisId = $formManager->insert($form);

                // Insert selected products into devis_product table
                if (isset($form['choix-produits']) && is_array($form['choix-produits'])) {
                    foreach ($form['choix-produits'] as $productId) {
                        $formManager->insertDevisProduct($devisId, (int)$productId);
                    }
                }

                header('Location: /success');
                return null;
            }
        }
        $productManager = new ProductManager();
        $products = $productManager->selectAll('name');

        return $this->twig->render('Product/product.html.twig', [
            'products' => $products,
            'errors' => $errors
        ]);
    }

    private function validateMessage(array $form, array &$errors)
    {
        if (empty($form['lastname'])) {
            $errors[] = 'Le champ nom est vide.';
        }
        if (empty($form['firstname'])) {
            $errors[] = 'Le champ prénom est vide.';
        }
        if (empty($form['address'])) {
            $errors[] = 'Le champ addresse est vide.';
        }
        if (empty($form['phone'])) {
            $errors[] = 'Le champ téléphone est vide.';
        }
        if (empty($form['email'])) {
            $errors[] = 'Le champ email est vide.';
        }
        if (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse mail n'est pas valide";
        }
    }
}
