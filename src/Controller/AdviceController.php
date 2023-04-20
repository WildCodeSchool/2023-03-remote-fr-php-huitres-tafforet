<?php

namespace App\Controller;

class AdviceController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Advice/advice.html.twig');
    }
}
