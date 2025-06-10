<?php

$month = 5;

switch($month){
    case 1:
    case 2:
    case 12:
        echo "It's winter";
        break;
    case 3:
    case 4:
    case 5:
        echo "It's spring";
        break;
    case 6:
    case 7:
    case 8:
        echo "It's summer";
        break;
    case 9:
    case 10:
    case 11:
        echo "It's autumn";
        break;
    default:
        echo "Invalid month";
        break;
}