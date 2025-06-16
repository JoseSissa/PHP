<?php

namespace app\interface;

interface RepositoryInterface
{
    public function create($data);
    public function get();
    public function update($data);
    public function delete(int $id);
    public function idExists(int $id);
}
