<?php

namespace App\Model;

use PDO;

class EventManager extends AbstractManager
{
    public const TABLE = 'event';

    public function insert(array $event): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (text)
        VALUES (:text)");
        $statement->bindValue('text', $event['text'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    public function update(array $event): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
        " SET text = :text WHERE id=:id");
        $statement->bindValue('id', $event['id'], PDO::PARAM_INT);
        $statement->bindValue('text', $event['text'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
