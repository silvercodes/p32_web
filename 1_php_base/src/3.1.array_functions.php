<?php
$numbers = [1, 2, 3];

// Количество элементов
echo "Count: " . count($numbers) . "\n";

// Добавить в конец
array_push($numbers, 4);
print_r($numbers);

// Извлечь из конца
$last = array_pop($numbers);
echo "Popped: $last\n";
print_r($numbers);

// Добавить в начало
array_unshift($numbers, 0);
print_r($numbers);

// Извлечь из начала
$first = array_shift($numbers);
echo "Shifted: $first\n";
print_r($numbers);

// Проверка наличия
echo in_array(2, $numbers) ? "Found\n" : "Not found\n";

// Проверка ключа
$user = ["name" => "Alice"];
echo array_key_exists("name", $user) ? "Key exists\n" : "Key not exists\n";
