<?php

namespace app\business;

use app\interface\ValidatorInterface;
use app\interface\RepositoryInterface;
use app\exceptions\ValidationException;

class Add
{
    private RepositoryInterface $repository;
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator, RepositoryInterface $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function add($data)
    {
        if (!$this->validator->validateAdd($data)) {
            throw new ValidationException($this->validator->getError());
        }

        $this->repository->create($data);
    }
}
