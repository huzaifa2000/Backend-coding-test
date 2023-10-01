<?php

namespace App\Services;

class GroupByOwnersService
{
    public function groupByOwners($files)
    {
        $result = [];

        foreach ($files as $file => $owner) {
            $result[$owner][] = $file;
        }

        return $result;
    }
}
