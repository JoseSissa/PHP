<?php

namespace app\data;

use app\interface\RepositoryInterface;

class Repository implements RepositoryInterface
{
    private string $fileData;
    private array $db;

    public function __construct(string $fileData)
    {
        $this->fileData = __DIR__ . '/data.json';
        $json = file_get_contents($this->fileData);
        $this->db = json_decode($json, true);
    }

    public function get(): array
    {
        return $this->db;
    }

    public function idExists(int $id): bool
    {
        foreach ($this->db as $item) {
            if ($item['id'] == $id) {
                return true;
            }
        }
        return false;
    }

    public function create($data)
    {
        if (count($this->db) == 0) {
            $data['id'] = 1;
        } else {
            $lastElem = $this->db[count($this->db) - 1];
            $data['id'] = (int)$lastElem['id'] + 1;
        }
        $this->db[] = $data;
        file_put_contents($this->fileData, json_encode($this->db));
    }

    public function update($data)
    {
        foreach ($this->db as $index => $elem) {
            if ($elem['id'] == $data['id']) {
                $this->db[$index] = $data;
                file_put_contents($this->fileData, json_encode($this->db));
                return;
            }
        }
    }

    public function delete(int $id)
    {
        foreach ($this->db as $index => $elem) {
            if ($elem['id'] == $id) {
                unset($this->db[$index]);
                $this->db = array_values($this->db);
                file_put_contents($this->fileData, json_encode($this->db));
                return;
            }
        }
    }
}
