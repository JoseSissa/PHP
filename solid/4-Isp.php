<?php

// Interface segregation principle

interface CrudBaseInterface
{
    public function create();
    public function read();
}

interface UpdateCrudInterface extends CrudBaseInterface
{
    public function update();
}

interface DeleteCrudInterface extends CrudBaseInterface
{
    public function delete();
}

interface GeneralCrudInterface extends CrudBaseInterface, UpdateCrudInterface, DeleteCrudInterface {}

class UserCrud implements GeneralCrudInterface
{
    public function create()
    {
        echo "Creating user... <br>";
    }

    public function read()
    {
        echo "Reading user... <br>";
    }

    public function update()
    {
        echo "Updating user... <br>";
    }

    public function delete()
    {
        echo "Deleting user... <br>";
    }
}

class SaleCrud implements CrudBaseInterface, DeleteCrudInterface
{
    public function create()
    {
        echo "Creating sale... <br>";
    }

    public function read()
    {
        echo "Reading sale... <br>";
    }

    public function delete()
    {
        echo "Deleting sale... <br>";
    }
}

function update(UpdateCrudInterface $crud)
{
    $crud->update();
}

update(new UserCrud());
