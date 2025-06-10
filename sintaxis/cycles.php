<?php

for ($i=0; $i < 10; $i++) {
    if($i % 2 == 0){
        continue;
    }
    echo "FOR: $i";
}

echo "<br>";

$i = 0;
while ($i < 10) {
    echo $i;
    $i++;
}

echo "<br>";
// Enter to the do section at least once
$j = 1;
do {
    echo "Entra: $j <br>";
    $j++;
} while ($j < 10);