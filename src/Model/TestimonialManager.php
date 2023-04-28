<?php

namespace App\Model;

use PDO;

class TestimonialManager extends AbstractManager
{
    public const TABLE = 'testimonial';

    public function insert(array $testimonial): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (testimonial)
        VALUES (:testimonial)");
        $statement->bindValue('testimonial', $testimonial['testimonial'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    public function update(array $testimonial): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET testimonial = :testimonial WHERE id=:id");
        $statement->bindValue('id', $testimonial['id'], PDO::PARAM_INT);
        $statement->bindValue('testimonial', $testimonial['testimonial'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
