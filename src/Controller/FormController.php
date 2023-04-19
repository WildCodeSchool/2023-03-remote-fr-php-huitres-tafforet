<?php

namespace App\Controller;

use App\Model\FormManager;

class FormController extends AbstractController
{
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $form = array_map('trim', $_POST);
            $form['delivery'] = isset($form['delivery']) && $form['delivery'] === 'oui';

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $formManager = new FormManager();
            $formManager->insert($form);

            header('Location: /success');
            return null;
        }

        return $this->twig->render('Product/success.html.twig');
    }
}
