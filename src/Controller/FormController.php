<?php

namespace App\Controller;

use App\Model\FormManager;

class FormController extends AbstractController
{
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $form = array_map(function ($value) {
                return is_string($value) ? trim($value) : $value;
            }, $_POST);
            $form['delivery'] = isset($form['delivery']) && $form['delivery'] === 'oui';

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
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


        return $this->twig->render('Product/success.html.twig');
    }
}
