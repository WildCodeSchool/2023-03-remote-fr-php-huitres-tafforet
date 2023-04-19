<?php

namespace App\Model;

class FormManager extends AbstractManager
{
    public const TABLE = 'devis';

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
        //$statement->bindValue('product_id', $devis['product_id'], \PDO::PARAM_INT);//
        $statement->bindValue('comment', $devis['comment'], \PDO::PARAM_STR);
        $statement->bindValue('delivery', $devis['delivery'], \PDO::PARAM_BOOL);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
