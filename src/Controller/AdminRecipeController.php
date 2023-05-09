<?php

namespace App\Controller;

use App\Model\FileManager;
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

        return $this->twig->render('Admin/Recipe/add.html.twig', [
            'errors' => $errors
        ]);
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
        $fileManager = new FileManager();
        return $this->twig->render('Admin/Recipe/edit.html.twig', [
            'recipe' => $recipe,
            'files' => $fileManager->selectAllByrecipeId($id),
            'errors' => $errors
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
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }
            $recipeId = $_POST['recipe_id'];
            $fileManager = new FileManager();
            foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
                $fileName = $_FILES['files']['name'][$index];
                $fileName = pathinfo(basename($_FILES['files']['name'][$index]), PATHINFO_FILENAME);
                $fileExt = pathinfo(basename($_FILES['files']['name'][$index]), PATHINFO_EXTENSION);
                $fullFileName = $fileName . "-" . uniqid() . "." . $fileExt;
                $uploadFile = $uploadDir . $fullFileName;
                if (move_uploaded_file($tmpName, $uploadFile)) {
                    $fileManager->insert($fullFileName, $recipeId);
                }
                header('Location: /recipe/edit?id=' . $recipeId);
            }
        }
    }


    public function deleteFile(int $id)
    {
        $fileManager = new FileManager();
        $file = $fileManager->selectOneById($id);
        if (unlink(__DIR__ . '/../../public/uploads/' . $file['name'])) {
            $fileManager->delete($id);
        }
        header('Location: /recipe/edit?id=' . $file['recipe_id']);
    }
}
