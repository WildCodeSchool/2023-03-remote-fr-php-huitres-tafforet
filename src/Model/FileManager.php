<?php

namespace App\Model;

use PDO;

class FileManager extends AbstractManager
{
    public const TABLE = 'file';

    public function insert(string $fileName, int $recipeId): int
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET position=position+1 WHERE recipe_id=:recipe_id");
        $statement->bindValue('recipe_id', $recipeId, PDO::PARAM_STR);
        $statement->execute();

        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `recipe_id`, `position`)
         VALUES (:name, :recipe_id, 1)");
        $statement->bindValue('name', $fileName, PDO::PARAM_STR);
        $statement->bindValue('recipe_id', $recipeId, PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function selectAllByrecipeId(int $recipeId)
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE recipe_id=:recipe_id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':recipe_id', $recipeId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function delete(int $id): void
    {
        $file = $this->selectOneById($id);
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET position=position-1 WHERE position>:position AND recipe_id=:recipe_id");
        $statement->bindValue('recipe_id', $file['recipe_id'], PDO::PARAM_INT);
        $statement->bindValue('position', $file['position'], PDO::PARAM_INT);
        $statement->execute();
        parent::delete($id);
    }
    public function deleteAllByRecipeId(int $recipeId): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE recipe_id=:recipe_id");
        $statement->bindValue('recipe_id', $recipeId, PDO::PARAM_INT);
        $statement->execute();
    }

    public function insertProduct(string $fileName, int $productId): int
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET position=position+1 WHERE product_id=:product_id");
        $statement->bindValue('product_id', $productId, PDO::PARAM_STR);
        $statement->execute();

        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `product_id`, `position`)
         VALUES (:name, :product_id, 1)");
        $statement->bindValue('name', $fileName, PDO::PARAM_STR);
        $statement->bindValue('product_id', $productId, PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function selectAllByproductId(int $productId)
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE product_id=:product_id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':product_id', $productId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function deleteProduct(int $id): void
    {
        $file = $this->selectOneById($id);
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET position=position-1 WHERE position>:position AND product_id=:product_id");
        $statement->bindValue('product_id', $file['product_id'], PDO::PARAM_INT);
        $statement->bindValue('position', $file['position'], PDO::PARAM_INT);
        $statement->execute();
        parent::delete($id);
    }
    public function deleteAllByProductId(int $productId): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE product_id=:product_id");
        $statement->bindValue('product_id', $productId, PDO::PARAM_INT);
        $statement->execute();
    }
}
