<?php

function show(int $limit)
{
    if ($limit == 0) {
        return;
    }
    echo $limit . "<br>";
    show($limit - 1);
}

show(5);
