<?php

namespace app\business;

use app\interface\ValidatorInterface;
use app\interface\RepositoryInterface;
// When something fails whit data from Users.
use app\exceptions\ValidationException;
// When something fails in DB.
use app\exceptions\DataException;

class Update
{
    private RepositoryInterface $repository;
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator, RepositoryInterface $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function update($data)
    {
        if (!$this->validator->validateUpdate($data)) {
            throw new ValidationException($this->validator->getError());
        }

        if (!$this->repository->idExists((int)$data['id'])) {
            throw new DataException('Data not found');
        }

        $this->repository->update($data);
    }
}
