<?php

namespace app\business;

use app\interface\RepositoryInterface;
use app\exceptions\DataException;

class Delete
{
    private RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        if (!$this->repository->idExists($id)) {
            throw new DataException('Data not found');
        }

        $this->repository->delete($id);
    }
}
