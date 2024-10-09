<?php

namespace Tests\Feature;

use function PHPUnit\Framework\assertEquals;
use Tests\TestCase;

class FilterTest extends TestCase
{
    public function testFilter()
    {
        $collection = collect([
            "haris" => "100",
            "dono" => "20",
            "dini" => "110",
        ]);
        $result = $collection->filter(function ($value, $key) {
            return $value >= 90;
        });
        assertEquals([
            "haris" => "100",
            "dini" => "110",
        ], $result->all());
    }
    public function testIndex()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $result = $collection->filter(function ($value, $key) {
            return $value % 2 == 0;
        });
        $this->assertEqualsCanonicalizing([2, 4, 6, 8, 10], $result->all());
    }
}
