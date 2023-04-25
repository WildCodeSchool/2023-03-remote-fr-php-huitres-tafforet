<?php

namespace App\Controller;

use App\Model\RecipeManager;
use App\Model\WineManager;

class RecipeController extends AbstractController
{
    public function index(): string
    {
        $recipesManager = new RecipeManager();
        $recipes = $recipesManager->selectAll();

        $wineManager = new WineManager();
        $wines = $wineManager->selectAll();

        return $this->twig->render('Recipe/index.html.twig', [
            'recipes' => $recipes,
            'wines' => $wines,
        ]);
    }
}
