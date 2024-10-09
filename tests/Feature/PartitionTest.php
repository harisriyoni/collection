<?php

namespace Tests\Feature;

use LDAP\Result;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class PartitionTest extends TestCase
{
    public function testPartition()
    {
        $collection = collect([
            "haris" => 100,
            "dono" => 80,
            "dini" => 90,
        ]);
        [$result1, $result2] = $collection->partition(function ($item, $key) {
            return $item >= 90;
        });
        assertEquals(["haris"=> 100, "dini"=> "90"], $result1->all());
        assertEquals(["dono"=> 80], $result2->all());
    }
}
