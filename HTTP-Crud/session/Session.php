<?php

namespace app\session;

use app\interface\RepositoryInterface;

class Session implements RepositoryInterface
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['beers'])) {
            $_SESSION['beers'] = [];
        }
    }

    public function get(): array
    {
        return $_SESSION['beers'];
    }

    public function create($data)
    {
        $beers = $_SESSION['beers'];
        if (count($beers) == 0) {
            $data['id'] = 1;
        } else {
            $lastElement = $beers[count($beers) - 1];
            $data['id'] = (int)$lastElement['id'] + 1;
        }
        array_push($beers, $data);
        $_SESSION['beers'] = $beers;
    }

    public function update($data)
    {
        $beers = $_SESSION['beers'];
        foreach ($beers as $index => $beer) {
            if ($beer['id'] == $data['id']) {
                $beers[$index] = $data;
                $_SESSION['beers'] = $beers;
                return;
            }
        }
    }

    public function delete($id)
    {
        $beers = $_SESSION['beers'];
        foreach ($beers as $index => $beer) {
            if ($beer['id'] == $id) {
                unset($beers[$index]);
                $_SESSION['beers'] = $beers;
                return;
            }
        }
    }

    public function idExists($id)
    {
        $beers = $_SESSION['beers'];
        foreach ($beers as $beer) {
            if ($beer['id'] == $id) {
                return true;
            }
        }
        return false;
    }
}
