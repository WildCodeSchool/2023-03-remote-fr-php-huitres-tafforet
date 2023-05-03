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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $recipe = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $recipeManager = new RecipeManager();
            $recipe = $recipeManager->insert($recipe);

            header('Location:/recipe/index');
            return null;
        }

        return $this->twig->render('Admin/Recipe/add.html.twig');
    }

    public function edit(int $id): ?string
    {
        $recipeManager = new RecipeManager();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $recipe = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $recipeManager->update($recipe);

            header('Location: /recipe/index');

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->twig->render('Admin/Recipe/edit.html.twig', [
            'recipe' => $recipeManager->selectOneById($id)
        ]);
    }

    public function delete(int $id): void
    {

        $recipeManager = new RecipeManager();
        $recipeManager->delete((int)$id);

        header('Location:/recipe/index');
    }
    public function addFiles()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadsDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir);
            }
            foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
                $fileName = $_FILES['files']['name'][$index];
                move_uploaded_file($tmpName, $uploadsDir . $fileName);
            }
        }
    }
}
