<?php

namespace App\Controller;

use App\Model\WineManager;
use App\Model\RecipeManager;

class AdminRecipeController extends AbstractController
{
    public function index(): string
    {
        $recipesManager = new RecipeManager();
        $recipes = $recipesManager->selectAll();

        $wineManager = new WineManager();
        $wines = $wineManager->selectAll();

        return $this->twig->render('Admin/Recipe/index.html.twig', [
            'recipes' => $recipes,
            'wines' => $wines,
        ]);
    }

    public function add(): ?string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $recipe = array_map('trim', $_POST);


            // TODO validations (length, format...)
            if (empty($recipe['name'])) {
                $errors[] = 'Le champ nom est vide.';
            }
            if (empty($recipe['content']) || strlen($recipe['content']) < 10) {
                $errors[] = 'Le champ ingrédients doit être completé et faire plus de 10 caractères.';
            }
            if (empty($recipe['back_content']) || strlen($recipe['back_content']) < 10) {
                $errors[] = 'Le champ étapes doit être completé et faire plus de 10 caractères.';
            }
            // if validation is ok, insert and redirection
            if (empty($errors)) {
                $recipeManager = new RecipeManager();
                $recipe = $recipeManager->insert($recipe);

                header('Location:/recipe/index');
                return null;
            }
        }

        return $this->twig->render('Admin/recipe/add.html.twig', [
            'errors' => $errors]);
    }

    public function edit(int $id): ?string
    {
        $recipeManager = new RecipeManager();
        $recipe = $recipeManager->selectOneById($id);
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // clean $_POST data
            $recipe = array_map('trim', $_POST);

            // TODO validations (length, format...)
            if (empty($recipe['name'])) {
                $errors[] = 'Le champ nom est vide.';
            }

            if (empty($recipe['content']) || strlen($recipe['content']) < 10) {
                $errors[] = 'Le champ ingrédients doit être completé et faire plus de 10 caractères.';
            }

            if (empty($recipe['back_content']) || strlen($recipe['back_content']) < 10) {
                $errors[] = 'Le champ étapes doit être completé et faire plus de 10 caractères.';
            }

            // if validation is ok, update and redirection
            if (empty($errors)) {
                $recipeManager->update($recipe);

                header('Location: /recipe/index');

                // we are redirecting so we don't want any content rendered
                return null;
            }
        }

        return $this->twig->render('Admin/Recipe/edit.html.twig', [
            'recipe' => $recipe,
            'errors' => $errors
        ]);
    }

    public function delete(int $id): void
    {

        $recipeManager = new RecipeManager();
        $recipeManager->delete((int)$id);

        header('Location:/recipe/index');
    }
}
