<?php

namespace app\business;

use app\interface\RepositoryInterface;

class Get
{
    private RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function get()
    {
        return $this->repository->get();
    }
}
