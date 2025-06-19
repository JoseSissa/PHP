<?php

namespace app\database;

use PDO;
use app\interface\RepositoryInterface;
use app\database\BaseRepository;

class RepositoryDB extends BaseRepository implements RepositoryInterface
{
    const TABLE = 'beer';

    public function get(): array
    {
        $sql = 'SELECT * FROM ' . self::TABLE;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function idExists(int $id): bool
    {
        $sql = 'SELECT * FROM ' . self::TABLE . ' WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->rowCount() > 0;
        return $result;
    }

    public function create($data)
    {
        $sql = 'INSERT INTO ' . self::TABLE . ' (name, alcohol, idBrand) VALUES (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['name'], $data['alcohol'], $data['idBrand']]);
    }

    public function update($data)
    {
        $sql = 'UPDATE ' . self::TABLE . ' SET name = ?, alcohol = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['name'], $data['alcohol'], $data['id']]);
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM ' . self::TABLE . ' WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
