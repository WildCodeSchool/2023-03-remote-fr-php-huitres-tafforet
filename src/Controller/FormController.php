<?php

namespace App\Controller;

use App\Model\FormManager;

class FormController extends AbstractController
{
    public function success(): ?string
    {
        return $this->twig->render('Product/success.html.twig');
    }
}
