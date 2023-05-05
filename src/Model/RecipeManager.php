<?php

namespace App\Model;

use PDO;
use App\Model\FileManager;

class RecipeManager extends AbstractManager
{
    public const TABLE = 'recipe';

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $recipes = parent::selectAll($orderBy, $direction);
        $fileManager = new FileManager();
        foreach ($recipes as &$recipe) {
            $recipe['files'] = $fileManager->selectAllByrecipeId($recipe['id']);
        }
        return $recipes;
    }

    public function insert(array $recipe): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`,`content`,`back_content`)
        VALUES (:name, :content, :back_content)");
        $statement->bindValue('name', $recipe['name'], PDO::PARAM_STR);
        $statement->bindValue('content', $recipe['content'], PDO::PARAM_STR);
        $statement->bindValue('back_content', $recipe['back_content'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    public function update(array $recipe): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET `name` = :name, `content` = :content, `back_content` = :back_content WHERE id=:id");
        $statement->bindValue('id', $recipe['id'], PDO::PARAM_INT);
        $statement->bindValue('name', $recipe['name'], PDO::PARAM_STR);
        $statement->bindValue('content', $recipe['content'], PDO::PARAM_STR);
        $statement->bindValue('back_content', $recipe['back_content'], PDO::PARAM_STR);

        return $statement->execute();
    }
    public function delete(int $id): void
    {
        $fileManager = new FileManager();
        $fileManager->deleteAllByRecipeId($id);
        parent::delete($id);
    }
}
