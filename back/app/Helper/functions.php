<?php

function array_find(array $items, callable $callback): mixed {
    $find = null;

    foreach ($items as $item) {
        if (! $callback($item)) continue;

        $find = $item;
        break;
    }

    return $find;
}
