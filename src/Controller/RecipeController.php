<?php

namespace App\Controller;

class RecipeController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Recipe/index.html.twig');
    }
}
