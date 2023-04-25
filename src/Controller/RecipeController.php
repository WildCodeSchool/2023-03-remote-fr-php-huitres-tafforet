<?php

namespace App\Controller;

use App\Model\RecipeManager;

class RecipeController extends AbstractController
{
    public function index(): string
    {
        $recipesManager = new RecipeManager();
        $recipes = $recipesManager->selectAll();
        return $this->twig->render('Recipe/index.html.twig', [
            'recipes' => $recipes
        ]);
    }
}
