<?php

namespace App\Model;

class FormManager extends AbstractManager
{
    public const TABLE = 'devis';
    public const JOINTABLE = 'devis_product';

    /**
     * Insert new item in database
     */
    public function insert(array $devis): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (lastname, firstname, address, phone, email, comment, delivery)
        VALUES (:lastname, :firstname, :address, :phone, :email, :comment, :delivery)");
        $statement->bindValue('lastname', $devis['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('firstname', $devis['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('address', $devis['address'], \PDO::PARAM_STR);
        $statement->bindValue('phone', $devis['phone'], \PDO::PARAM_STR);
        $statement->bindValue('email', $devis['email'], \PDO::PARAM_STR);
        $statement->bindValue('comment', $devis['comment'], \PDO::PARAM_STR);
        $statement->bindValue('delivery', $devis['delivery'], \PDO::PARAM_BOOL);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function insertDevisProduct(int $devisId, int $productId): bool
    {
        $statement = $this->pdo->prepare("INSERT INTO devis_product (devis_id, product_id)
        VALUES (:devis_id, :product_id)");
        $statement->bindValue('devis_id', $devisId, \PDO::PARAM_INT);
        $statement->bindValue('product_id', $productId, \PDO::PARAM_INT);

        return $statement->execute();
    }

    public function deleteDevis(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM " . static::JOINTABLE . " WHERE devis_id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $this->delete($id);
        return $statement->execute();
    }
}
