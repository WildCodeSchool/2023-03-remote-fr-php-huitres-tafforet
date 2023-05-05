<?php

namespace App\Model;

use PDO;

class ProductManager extends AbstractManager
{
    public const TABLE = 'product';
    public const JOINTABLE = 'category';

    public function insert(array $product): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`name`,`description`,`information`, `category_id`)
        VALUES (:name, :description, :information, :category_id)");
        $statement->bindValue('name', $product['name'], PDO::PARAM_STR);
        $statement->bindValue('description', $product['description'], PDO::PARAM_STR);
        $statement->bindValue('information', $product['information'], PDO::PARAM_STR);
        $statement->bindValue('category_id', $product['category_id'], PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    public function update(array $product): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
        " SET `name` = :name, `description` = :description, `information` = :information WHERE id=:id");
        $statement->bindValue('id', $product['id'], PDO::PARAM_INT);
        $statement->bindValue('name', $product['name'], PDO::PARAM_STR);
        $statement->bindValue('description', $product['description'], PDO::PARAM_STR);
        $statement->bindValue('information', $product['information'], PDO::PARAM_STR);

        return $statement->execute();
    }

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $products = parent::selectAll($orderBy, $direction);
        $fileManager = new FileManager();
        foreach ($products as &$product) {
            $product['files'] = $fileManager->selectAllByproductId($product['id']);
        }
        return $products;
    }

    public function delete(int $id): void
    {
        $fileManager = new FileManager();
        $fileManager->deleteAllByProductId($id);
        parent::delete($id);
    }
}
